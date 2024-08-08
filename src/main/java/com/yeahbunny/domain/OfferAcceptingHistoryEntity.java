package com.yeahbunny.domain;

import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "offer_accepting_history")
public class OfferAcceptingHistoryEntity extends AbstractEntity{

    @OneToOne()
    @JoinColumn(name = "admin_id")
    private AdminEntity admin;

    @Column(name = "reason")
    private String reason;

    public void setAdmin(AdminEntity admin) {
        this.admin = admin;
    }

    public AdminEntity getAdmin() {
        return admin;
    }

    public void setReason(String reason) {
        this.reason = reason;
    }

    public String getReason() {
        return reason;
    }

}
