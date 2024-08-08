package com.yeahbunny.service;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.inject.Inject;

@Service
public class NotifyAdminService {
    @Value("${app.admin.notify-error-mail}")
    private String adminNotifyErrorMail;

    @Value("${app.mail.from}")
    String mailFrom;

    @Inject
    SendMailService sendMailService;

    public void currencyUpdaterError() {
        //todo send mail
    }
}
