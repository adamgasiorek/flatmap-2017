package com.yeahbunny.mail;

import com.sun.corba.se.pept.transport.ContactInfoList;

import javax.mail.internet.InternetAddress;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by kroli on 29.12.2016.
 */
public class SendMailRequest {
    private Object body;
    private String subject;
    private List<String> to = new ArrayList<>();
    private String from;
    private String templateFile;


    private SendMailRequest() {
    }

    public static SendMailRequest init(String templateFile ) {
        SendMailRequest request = new SendMailRequest();
        request.templateFile = templateFile;
        return request;
    }

    public SendMailRequest to(String email) {
        this.to.add(email);
        return this;
    }

    public SendMailRequest from(String from) {
        this.from = from;
        return this;
    }


    public SendMailRequest withSubject(String subject) {
        this.subject =  subject;
        return this;
    }

    public SendMailRequest withBody(Object body) {
        this.body = body;
        return this;
    }

    public Object getBody() {
        return body;
    }

    public String getSubject() {
        return subject;
    }

    public List<String> getTo() {
        return to;
    }

    public String getTemplateFile() {
        return templateFile;
    }

    public String getFrom() {
        return from;
    }
}
