package com.yeahbunny.ws.dto;

import org.hibernate.validator.constraints.NotBlank;
import org.springframework.data.domain.Example;

import javax.validation.constraints.NotNull;

public class ChangeForgottenPasswordRequest {
    @NotNull
    private Long requestId;
    @NotNull
    @NotBlank
    private String token;
    @NotNull
    @NotBlank
    private String password;

    public Long getRequestId() {
        return requestId;
    }

    public void setRequestId(Long requestId) {
        this.requestId = requestId;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
