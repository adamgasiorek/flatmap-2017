package com.yeahbunny.ws.dto;

import org.hibernate.validator.constraints.NotBlank;
import org.springframework.data.domain.Example;

import javax.validation.constraints.NotNull;

/**
 * Created by kroli on 15.01.2017.
 */
public class CancelForgottenPasswordRequest {
    @NotNull
    private Long requestId;
    @NotNull
    @NotBlank
    private String token;

    public Long getRequestId() {
        return requestId;
    }

    public String getToken() {
        return token;
    }

    public void setRequestId(Long requestId) {
        this.requestId = requestId;
    }

    public void setToken(String token) {
        this.token = token;
    }
}
