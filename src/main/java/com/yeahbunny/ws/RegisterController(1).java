package com.yeahbunny.ws;

import com.yeahbunny.dao.ActivationTokenRepository;
import com.yeahbunny.dao.ContactRepository;
import com.yeahbunny.dao.ForgottenPasswordTokenRepository;
import com.yeahbunny.dao.PersonRepository;
import com.yeahbunny.domain.ActivationTokenEntity;
import com.yeahbunny.domain.ContactEntity;
import com.yeahbunny.domain.ForgottenPasswordTokenEntity;
import com.yeahbunny.domain.PersonEntity;
import com.yeahbunny.service.NotifyUserService;
import com.yeahbunny.service.TokenBuilderService;
import com.yeahbunny.ws.dto.*;
import com.yeahbunny.ws.util.PersonPrincipalProvider;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.ResponseEntity;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import javax.validation.Valid;
import java.time.ZonedDateTime;

@RestController
public class RegisterController {

    private static final Logger LOG = LoggerFactory.getLogger(RegisterController.class);
    private static final String INVALID_EMAIL = "INVALID_EMAIL";
    private static final String DUPLICATE_MAIL = "DUPLICATE_EMAIL";
    private static final String INVALID_ACTIVATION_TOKEN = "INVALID_ACTIVATION_TOKEN";
    private static final String ALREADY_ACTIVATED = "ALREADY_ACTIVATED";

    @Inject
    PersonRepository personRepository;

    @Inject
    ContactRepository contactRepository;

    @Inject
    ActivationTokenRepository activationTokenRepository;

    @Inject
    PersonPrincipalProvider personPrincipalProvider;

    @Inject
    NotifyUserService notifyUserService;

    @Value("${app.offer.price}")
    private int offerPrice;

    @Inject
    private ForgottenPasswordTokenRepository forgottenPasswordTokenRepository;

    @RequestMapping(value = "/register", method = RequestMethod.POST)
    @Transactional
    public ResponseEntity<String> registerAccount(@RequestBody @Valid RegisterRequest registerRequest){

        LOG.debug("Registring {}", registerRequest.getEmail());

        try {
            InternetAddress adress = new InternetAddress(registerRequest.getEmail());
            adress.validate();
        } catch (AddressException e) {
            return ResponseEntity.status(400).body(INVALID_EMAIL);
        }

        if(personRepository.findByEmail(registerRequest.getEmail())!= null){
            LOG.debug("Email {} duplicate", registerRequest.getEmail());
            return ResponseEntity.status(400).body(DUPLICATE_MAIL);
        }

        PersonEntity personEntity = generatePersonEntity(registerRequest);
        personRepository.save(personEntity);

        ActivationTokenEntity activationTokenEntity = generateActivationTokenEntity(personEntity);
        activationTokenRepository.save(activationTokenEntity);

        notifyUserService.sendActivationMail(personEntity, activationTokenEntity);

        return ResponseEntity.ok("");
    }

    @RequestMapping(value = "/register/reSendActivateMail", method = RequestMethod.POST)
    @Transactional
    public ResponseEntity<String> reSendActivateEmail(){
        PersonEntity personEntity = personPrincipalProvider.getEntity();

        LOG.debug("Sending again activation email {}", personEntity.getEmail());
        if(personEntity.isActivated()){
            LOG.debug("Person {} already activated", personEntity.getEmail());
            ResponseEntity.status(400).body(ALREADY_ACTIVATED);
        }

        activationTokenRepository.deleteByPersonId(personEntity.getId());

        ActivationTokenEntity activationTokenEntity = generateActivationTokenEntity(personEntity);
        activationTokenRepository.save(activationTokenEntity);
        notifyUserService.sendActivationMail(personEntity, activationTokenEntity);

        return ResponseEntity.ok("");
    }

    @RequestMapping(value = "/register/activateMail", method = RequestMethod.POST)
    @Transactional
    public ResponseEntity<String> activateEmail(@RequestBody @Valid MailActivationRequest mailActivationRequest){
        LOG.debug("Activating mail token id {} by token {}", mailActivationRequest.getRequestId(), mailActivationRequest.getToken());

        ActivationTokenEntity activationTokenEntity = activationTokenRepository.findByIdAndToken(mailActivationRequest.getRequestId(),mailActivationRequest.getToken());
        if(activationTokenEntity==null){
            LOG.debug(INVALID_ACTIVATION_TOKEN);
            return ResponseEntity.status(400).body(INVALID_ACTIVATION_TOKEN);
        }

        PersonEntity personEntity = activationTokenEntity.getPerson();

        if(!personEntity.isActivated()){
            personEntity.setActivated(true);
            personEntity.addPoints(offerPrice);
        }

        activationTokenRepository.deleteByPersonId(activationTokenEntity.getPerson().getId());
        return ResponseEntity.ok("");
    }

    @RequestMapping(value = "/forgottenPassword", method = RequestMethod.POST)
    public ResponseEntity<String> forgotPassword(@RequestBody @Valid ForgottenPasswordRequest forgottenPasswordRequest){
        LOG.info("User with mail {} forgot password", forgottenPasswordRequest.getEmail());

        PersonEntity personEntity = personRepository.findByEmail(forgottenPasswordRequest.getEmail());
        if(personEntity == null){
            LOG.info("User with mail {} does't exists", forgottenPasswordRequest.getEmail());
            return ResponseEntity.status(400).body("USER_DOESNT_EXISTS");
        }

        ForgottenPasswordTokenEntity forgottenPasswordTokenEntity = generateForgottenPasswordTokenEntity(personEntity);
        forgottenPasswordTokenRepository.save(forgottenPasswordTokenEntity);

        notifyUserService.sendForgottenPasswordEmail(forgottenPasswordTokenEntity);

        return ResponseEntity.ok("");
    }

    @Transactional
    @RequestMapping(value = "/forgottenPassword/changePassword", method = RequestMethod.POST)
    public ResponseEntity<String> changeForgottenPassword(@RequestBody(required = true) @Valid ChangeForgottenPasswordRequest changeForgottenPasswordRequest){
        LOG.info("Request id {} changing forgotten password", changeForgottenPasswordRequest.getRequestId());

        ForgottenPasswordTokenEntity forgottenPasswordTokenEntity = forgottenPasswordTokenRepository.findOne(changeForgottenPasswordRequest.getRequestId());
        if(forgottenPasswordTokenEntity == null || !forgottenPasswordTokenEntity.getToken().equals( changeForgottenPasswordRequest.getToken())){
            LOG.info("Request id {} does't match change password token token {}", changeForgottenPasswordRequest.getRequestId(), changeForgottenPasswordRequest.getToken());
            return ResponseEntity.status(403).body("INVALID_DATA");
        }

        PersonEntity personEntity = personRepository.findOne(forgottenPasswordTokenEntity.getPerson().getId());

        personEntity.setPassword(changeForgottenPasswordRequest.getPassword());

        forgottenPasswordTokenRepository.deleteByPersonId(personEntity.getId());

        return ResponseEntity.ok("OK");

    }

    @RequestMapping(value = "/forgottenPassword/cancel", method = RequestMethod.POST)
    public ResponseEntity<String> cancelForgottenPassword(@RequestBody @Valid CancelForgottenPasswordRequest changeForgottenPasswordRequest){
        LOG.info("Request id {} cancel forgotten password", changeForgottenPasswordRequest.getRequestId());

        ForgottenPasswordTokenEntity forgottenPasswordTokenEntity = forgottenPasswordTokenRepository.findOne(changeForgottenPasswordRequest.getRequestId());
        if(forgottenPasswordTokenEntity==null || !forgottenPasswordTokenEntity.getToken().equals( changeForgottenPasswordRequest.getToken())){
            LOG.info("Request id {} does't match chagne password token to delete token {}", changeForgottenPasswordRequest.getRequestId(), changeForgottenPasswordRequest.getToken());
            return ResponseEntity.status(403).body("INVALID_DATA");
        }

        forgottenPasswordTokenRepository.delete(forgottenPasswordTokenEntity);

        return ResponseEntity.ok("OK");

    }

    private PersonEntity generatePersonEntity(RegisterRequest registerRequest) {
        PersonEntity result = new PersonEntity();
        result.setEmail(registerRequest.getEmail());
        result.setName(registerRequest.getName());
        result.setIsAgency(registerRequest.isAgency());
        result.setPassword(registerRequest.getPassword());
        ContactEntity contactEntity = new ContactEntity();
        contactEntity.setName(registerRequest.getName());
        contactEntity.setEmail(registerRequest.getEmail());
        contactEntity.setPhoneNumber(registerRequest.getPhoneNumber());
        contactRepository.save(contactEntity);
        result.setContact(contactEntity);
        return result;
    }

    private ActivationTokenEntity generateActivationTokenEntity(PersonEntity personEntity) {
        ActivationTokenEntity tokenEntity = new ActivationTokenEntity();
        tokenEntity.setToken(TokenBuilderService.buildToken());
        tokenEntity.setPerson(personEntity);
        tokenEntity.setGenerateDate(ZonedDateTime.now());

        return tokenEntity;

    }

    private ForgottenPasswordTokenEntity generateForgottenPasswordTokenEntity(PersonEntity personEntity) {
        ForgottenPasswordTokenEntity tokenEntity = new ForgottenPasswordTokenEntity();
        tokenEntity.setToken(TokenBuilderService.buildToken());
        tokenEntity.setPerson(personEntity);
        tokenEntity.setGenerateDate(ZonedDateTime.now());

        return tokenEntity;
    }

}
