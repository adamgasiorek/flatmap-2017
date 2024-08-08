package com.yeahbunny.mail;

/**
 * Created by kroli on 29.12.2016.
 */
public class EmailActivationMail {
    private String userName;
    private String url;

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getUserName() {
        return userName;
    }

    public String getUrl() {
        return url;
    }
}
