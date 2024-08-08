package com.yeahbunny.ws.dto.offer;

import com.fasterxml.jackson.databind.annotation.JsonSerialize;
import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;
import com.yeahbunny.ws.util.Java8DateTimeJsonSerializer;

import javax.persistence.Column;
import javax.persistence.Convert;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import java.time.ZonedDateTime;

public class ReportDto {

    private Long id;
    private OfferDto offer;
    @JsonSerialize(using= Java8DateTimeJsonSerializer.class)
    private ZonedDateTime reportDate;
    private String cause;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public OfferDto getOffer() {
        return offer;
    }

    public void setOffer(OfferDto offer) {
        this.offer = offer;
    }

    public ZonedDateTime getReportDate() {
        return reportDate;
    }

    public void setReportDate(ZonedDateTime reportDate) {
        this.reportDate = reportDate;
    }

    public String getCause() {
        return cause;
    }

    public void setCause(String cause) {
        this.cause = cause;
    }
}
