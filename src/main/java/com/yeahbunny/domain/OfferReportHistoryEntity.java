package com.yeahbunny.domain;

import javax.persistence.*;

@Entity
@Table(name = "offer_report_history")
public class OfferReportHistoryEntity extends AbstractEntity{

    @ManyToOne
    @JoinColumn(name = "admin_id")
    private AdminEntity admin;

    @ManyToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "report_id")
    private ReportedOfferEntity report;


    @Column(name = "reason")
    private String reason;


    public AdminEntity getAdmin() {
        return admin;
    }

    public void setAdmin(AdminEntity admin) {
        this.admin = admin;
    }

    public ReportedOfferEntity getReport() {
        return report;
    }

    public void setReport(ReportedOfferEntity report) {
        this.report = report;
    }

    public String getReason() {
        return reason;
    }

    public void setReason(String reason) {
        this.reason = reason;
    }
}
