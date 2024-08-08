package com.yeahbunny.ws.dto;

import org.hibernate.validator.constraints.NotBlank;

import javax.validation.constraints.NotNull;

/**
 * Created by kroli on 14.01.2017.
 */
public class ForgottenPasswordRequest {
    @NotBlank
    @NotNull
    private String email;

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }


}
