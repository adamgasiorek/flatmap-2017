package com.yeahbunny.ws.dto;


import javax.validation.constraints.NotNull;

public class AcceptOfferRequest {

    @NotNull
    private Long offerId;

    public Long getOfferId() {
        return offerId;
    }

    public void setOfferId(Long offerId) {
        this.offerId = offerId;
    }
}
