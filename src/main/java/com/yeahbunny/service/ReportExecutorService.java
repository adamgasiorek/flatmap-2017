package com.yeahbunny.service;

import com.yeahbunny.dao.OfferHistoryRepository;
import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.domain.OfferHistoryEntity;
import com.yeahbunny.domain.OfferReportHistoryEntity;
import com.yeahbunny.domain.ReportedOfferEntity;
import org.springframework.stereotype.Service;

import javax.inject.Inject;
import java.time.ZonedDateTime;

@Service
public class ReportExecutorService {

    @Inject
    private OfferHistoryRepository offerHistoryRepository;

    @Inject
    private NotifyUserService notifyUserService;

    public void ignoreReport(ReportedOfferEntity reportedOfferEntity, AdminEntity adminEntity) {
        reportedOfferEntity.setConsumed(true);
        OfferReportHistoryEntity reportHistoryEntity = new OfferReportHistoryEntity();
        reportHistoryEntity.setReason(null);
        reportHistoryEntity.setAdmin(adminEntity);
        reportHistoryEntity.setReport(reportedOfferEntity);

        OfferHistoryEntity historyEntity = new OfferHistoryEntity();
        historyEntity.setDeactivated(null);
        historyEntity.setEventDate(ZonedDateTime.now());
        historyEntity.setOffer(reportedOfferEntity.getOffer());
        historyEntity.setOfferReportHistory(reportHistoryEntity);

        this.offerHistoryRepository.save(historyEntity);
    }

    public void executeReport(ReportedOfferEntity reportedOfferEntity, AdminEntity adminEntity, String banReason) {

        reportedOfferEntity.setConsumed(true);

        OfferReportHistoryEntity reportHistoryEntity = new OfferReportHistoryEntity();
        reportHistoryEntity.setReport(reportedOfferEntity);
        reportHistoryEntity.setAdmin(adminEntity);
        reportHistoryEntity.setReason(banReason);

        OfferHistoryEntity historyEntity = new OfferHistoryEntity();
        historyEntity.setOfferReportHistory(reportHistoryEntity);
        historyEntity.setDeactivated(true);
        historyEntity.setOffer(reportedOfferEntity.getOffer());
        historyEntity.setEventDate(ZonedDateTime.now());

        this.offerHistoryRepository.save(historyEntity);

        notifyUserService.notifyOfferBannedByReport(historyEntity);


    }
}
