package com.yeahbunny.ws.dto;

import com.fasterxml.jackson.annotation.JsonProperty;
import org.hibernate.validator.constraints.NotBlank;

import javax.validation.constraints.NotNull;


public class MailActivationRequest {
    @NotBlank
    @NotNull
    private String token;

    @NotNull
    @JsonProperty(value = "u")
    private Long requestId;

    public void setToken(String token) {
        this.token = token;
    }

    public void setRequestId(Long requestId) {
        this.requestId = requestId;
    }

    public String getToken() {
        return token;
    }

    public Long getRequestId() {
        return requestId;
    }
}
