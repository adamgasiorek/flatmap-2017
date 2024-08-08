package com.yeahbunny.ws.dto;

import org.hibernate.validator.constraints.NotBlank;
import org.springframework.data.domain.Example;

import javax.validation.constraints.NotNull;

/**
 * Created by kroli on 16.01.2017.
 */
public class ReportOfferRequest {
    @NotNull
    @NotBlank
    private String offerId;
    @NotNull
    @NotBlank
    private String cause;

    public String getOfferId() {
        return offerId;
    }

    public String getCause() {
        return cause;
    }

    public void setCause(String cause) {
        this.cause = cause;
    }

    public void setOfferId(String offerId) {
        this.offerId = offerId;
    }
}
