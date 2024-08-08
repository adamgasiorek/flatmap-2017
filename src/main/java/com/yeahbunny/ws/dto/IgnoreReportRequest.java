package com.yeahbunny.ws.dto;


import javax.validation.constraints.NotNull;

public class IgnoreReportRequest {

    @NotNull
    private Long reportId;

    public Long getReportId() {
        return reportId;
    }

    public void setReportId(Long reportId) {
        this.reportId = reportId;
    }
}
