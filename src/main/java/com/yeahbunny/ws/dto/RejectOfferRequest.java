package com.yeahbunny.ws.dto;


import org.hibernate.validator.constraints.NotBlank;

import javax.validation.constraints.NotNull;

public class RejectOfferRequest {

    @NotNull
    private Long offerId;

    @NotNull
    @NotBlank
    private String reason;

    public Long getOfferId() {
        return offerId;
    }

    public void setOfferId(Long offerId) {
        this.offerId = offerId;
    }

    public String getReason() {
        return reason;
    }

    public void setReason(String reason) {
        this.reason = reason;
    }
}
