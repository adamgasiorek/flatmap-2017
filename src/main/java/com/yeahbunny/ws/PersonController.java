package com.yeahbunny.ws;

import com.yeahbunny.dao.PersonRepository;
import com.yeahbunny.domain.ContactEntity;
import com.yeahbunny.domain.PersonEntity;
import com.yeahbunny.ws.dto.ChangeMyPasswordRequest;
import com.yeahbunny.ws.dto.MyUserDto;
import com.yeahbunny.ws.dto.offer.ContactDto;
import com.yeahbunny.ws.util.DtoGenerator;
import com.yeahbunny.ws.util.PersonPrincipalProvider;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import javax.validation.Valid;

@RestController
@RequestMapping(value = "/person")
public class PersonController {
    private static final Logger LOG = LoggerFactory.getLogger(PersonController.class);
    @Inject
    PersonPrincipalProvider personPrincipalProvider;

    @Inject
    PersonRepository personRepository;


    @RequestMapping(value = "/getMyUser", method = RequestMethod.GET)
    @ResponseBody
    public MyUserDto getMyUser(){
        PersonEntity personEntity = personPrincipalProvider.getEntity();
        ContactEntity contactEntity = this.personPrincipalProvider.getEntity().getContact();
        MyUserDto myUserDto = new MyUserDto();
        myUserDto.setContact(new DtoGenerator<ContactDto>().generate(ContactDto.class,contactEntity));
        myUserDto.setName(personEntity.getName());
        myUserDto.setActivated(personEntity.isActivated());
        myUserDto.setPoints(personEntity.getPoints());

        return myUserDto;
    }

    @RequestMapping(value = "/getMyContact", method = RequestMethod.GET)
    @ResponseBody
    public ContactDto getMyContact(){
        ContactEntity contactEntity = this.personPrincipalProvider.getEntity().getContact();
        return new DtoGenerator<ContactDto>().generate(ContactDto.class,contactEntity);
    }

    @RequestMapping(value = "/changePassword", method = RequestMethod.POST)
    @ResponseBody
    public ResponseEntity<String> changePassword(@RequestBody @Valid ChangeMyPasswordRequest changeMyPasswordRequest){
        PersonEntity personEntity = this.personPrincipalProvider.getEntity();
        LOG.info("User {} changing password", personEntity.getEmail());
        if(!personEntity.getPassword().equals(changeMyPasswordRequest.getOldPassword())){
            LOG.info("User {} send invalid old password", personEntity.getEmail());
            return ResponseEntity.status(403).body("OLD_PASSWORD_INVALID");
        }

        personEntity.setPassword(changeMyPasswordRequest.getNewPassword());
        personRepository.save(personEntity);
        return ResponseEntity.ok("");
    }


}
