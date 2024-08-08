package com.yeahbunny.service;

import com.yeahbunny.domain.*;
import com.yeahbunny.mail.EmailActivationMail;
import com.yeahbunny.mail.ForgottenPasswordMail;
import com.yeahbunny.mail.SendMailRequest;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.inject.Inject;

/**
 * Created by kroli on 04.01.2017.
 */
@Service
public class NotifyUserService {

    private final static Logger LOG = LoggerFactory.getLogger(NotifyUserService.class);

    @Value("${app.host}")
    String appHost;

    @Value("${app.mail.verification.link}")
    String mailAccountVerificationLink;

    @Value("${app.mail.forgotten_password_change.link}")
    String forgottenPasswordChangeLink;

    @Value("${app.mail.forgotten_password_cancel.link}")
    String forgottenPasswordCancelLink;

    @Value("${app.mail.from}")
    String mailFrom;

    @Inject
    SendMailService sendMailService;

    public void notifyOfferExtended(OfferEntity offerEntity) {

        LOG.debug("Sending notify offer extended to  {}", offerEntity.getContact().getEmail());
        //todo send mails
    }

    public void notifyOfferAutoExtended(OfferEntity offerEntity) {
        LOG.debug("Sending notify offer auto extended to  {}", offerEntity.getContact().getEmail());

    }

    public void notifyOfferDeativated(OfferEntity offerEntity) {
        LOG.debug("Sending notify offer deactivated to  {}", offerEntity.getContact().getEmail());

    }

    public void notifyCantAffordToAutoExtend(OfferEntity offerEntity) {
        LOG.debug("Sending notify cant afford to auto extend offer to  {}", offerEntity.getContact().getEmail());

    }

    public void notifyEndOfOfferIncoming(OfferEntity offerEntity) {
        LOG.debug("Sending notify end offer incoming to {}", offerEntity.getContact().getEmail());

    }

    public void sendActivationMail(PersonEntity personEntity, ActivationTokenEntity activationTokenEntity) {

        EmailActivationMail mail = new EmailActivationMail();
        mail.setUserName(personEntity.getName());
        mail.setUrl(appHost + mailAccountVerificationLink + "?token=" + activationTokenEntity.getToken() + "&u=" + activationTokenEntity.getId());

        LOG.debug("Generate activation email with link {}", mail.getUrl());

        SendMailRequest mailRequest =
                SendMailRequest.init("mail_activation.vm")
                        .withSubject("Potwierdzenie adresu email")
                        .to(personEntity.getEmail())
                        .from(mailFrom)
                        .withBody(mail);

       sendMailService.execute(mailRequest);

    }

    public void sendForgottenPasswordEmail(ForgottenPasswordTokenEntity forgottenPasswordTokenEntity) {
        ForgottenPasswordMail mail = new ForgottenPasswordMail();
        mail.setUserName(forgottenPasswordTokenEntity.getPerson().getName());
        mail.setUrl(appHost + forgottenPasswordChangeLink + "?token=" + forgottenPasswordTokenEntity.getToken() + "&u=" + forgottenPasswordTokenEntity.getId());
        mail.setCancelUrl(appHost + forgottenPasswordCancelLink + "?token=" + forgottenPasswordTokenEntity.getToken() + "&u=" + forgottenPasswordTokenEntity.getId());
        LOG.debug("Generate forgotten password email with link {}", mail.getUrl());

        SendMailRequest mailRequest =
                SendMailRequest.init("mail_forgotten_password.vm")
                        .withSubject("Zmiana hasła")
                        .to(forgottenPasswordTokenEntity.getPerson().getEmail())
                        .from(mailFrom)
                        .withBody(mail);

        sendMailService.execute(mailRequest);
    }

    public void notifyOfferRejectedByAdmin(OfferHistoryEntity historyEntity) {
        LOG.debug("Sending notify offer rejected by admin to {}", historyEntity.getOffer().getContact().getEmail());
    }

    public void notifyOfferBannedByReport(OfferHistoryEntity historyEntity) {
        LOG.debug("Sending offer banned by report to {}", historyEntity.getOffer().getContact().getEmail());
    }
}
