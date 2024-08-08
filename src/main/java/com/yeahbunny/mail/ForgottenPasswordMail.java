package com.yeahbunny.mail;

/**
 * Created by kroli on 15.01.2017.
 */
public class ForgottenPasswordMail {
    private String userName;
    private String url;
    private String cancelUrl;

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public String getUserName() {
        return userName;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getUrl() {
        return url;
    }

    public String getCancelUrl() {
        return cancelUrl;
    }

    public void setCancelUrl(String cancelUrl) {
        this.cancelUrl = cancelUrl;
    }
}
