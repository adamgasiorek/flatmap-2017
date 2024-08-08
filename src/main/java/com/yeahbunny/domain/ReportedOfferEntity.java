package com.yeahbunny.domain;


import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "reported_offer")
public class ReportedOfferEntity extends AbstractEntity{

    @ManyToOne()
    @JoinColumn(name="offer_id")
    private OfferEntity offer;

    @Column(name = "report_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime reportDate;

    @Column(name = "cause")
    private String cause;

    @Column(name = "consumed")
    private boolean consumed;

    public OfferEntity getOffer() {
        return offer;
    }

    public void setOffer(OfferEntity offer) {
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

    public boolean getConsumed() {
        return consumed;
    }

    public void setConsumed(boolean consumed) {
        this.consumed = consumed;
    }
}
