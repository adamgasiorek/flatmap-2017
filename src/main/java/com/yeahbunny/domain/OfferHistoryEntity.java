package com.yeahbunny.domain;

import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "offer_history")
public class OfferHistoryEntity extends AbstractEntity{

    @ManyToOne
    @JoinColumn(name = "offer_id")
    private OfferEntity offer;

    @Column(name = "deactivated")
    private Boolean deactivated;

    @Column(name = "event_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime eventDate;

    @OneToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "offer_accepting_history_id")
    private OfferAcceptingHistoryEntity offerAcceptingHistory;

    @OneToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "offer_report_history_id")
    private OfferReportHistoryEntity offerReportHistory;

/*    @OneToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "offer_activation_payment_history_id")
    private OfferActivationPaymentHistoryEntity offerActivationPaymentHistoryEntity;*/

    public OfferEntity getOffer() {
        return offer;
    }

    public void setOffer(OfferEntity offer) {
        this.offer = offer;
    }

    public Boolean getDeactivated() {
        return deactivated;
    }

    public void setDeactivated(Boolean deactivated) {
        this.deactivated = deactivated;
    }

    public ZonedDateTime getEventDate() {
        return eventDate;
    }

    public void setEventDate(ZonedDateTime eventDate) {
        this.eventDate = eventDate;
    }

    public OfferAcceptingHistoryEntity getOfferAcceptingHistory() {
        return offerAcceptingHistory;
    }

    public void setOfferAcceptingHistory(OfferAcceptingHistoryEntity offerAcceptingHistory) {
        this.offerAcceptingHistory = offerAcceptingHistory;
    }

    public OfferReportHistoryEntity getOfferReportHistory() {
        return offerReportHistory;
    }

    public void setOfferReportHistory(OfferReportHistoryEntity offerReportHistory) {
        this.offerReportHistory = offerReportHistory;
    }
}
