package com.yeahbunny.service;

import com.yeahbunny.exception.BadArgumentsException;
import com.yeahbunny.mail.SendMailRequest;
import org.apache.velocity.app.VelocityEngine;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.mail.javamail.MimeMessageHelper;
import org.springframework.stereotype.Service;
import org.springframework.ui.velocity.VelocityEngineUtils;

import javax.inject.Inject;
import javax.mail.MessagingException;
import javax.mail.internet.MimeMessage;
import java.util.HashMap;
import java.util.Map;

@Service
public class SendMailService{

    @Inject
    JavaMailSender mailSender;

    @Inject
    VelocityEngine velocityEngine;

    public void execute(SendMailRequest sendMailRequest) {

        Map model = new HashMap();
        model.put("body", sendMailRequest.getBody());

        String text = VelocityEngineUtils.mergeTemplateIntoString(
                velocityEngine, sendMailRequest.getTemplateFile(), "utf-8", model);

        MimeMessage msg = mailSender.createMimeMessage();

        try {
            MimeMessageHelper helper = new MimeMessageHelper(msg, true);
            helper.setText(text, true);
            helper.setSubject(sendMailRequest.getSubject());
            helper.setTo(sendMailRequest.getTo().iterator().next());
            helper.setFrom(sendMailRequest.getFrom());
        } catch (MessagingException e) {
            e.printStackTrace();
            throw new RuntimeException(e);
        }

        this.mailSender.send(msg);

    }
}
