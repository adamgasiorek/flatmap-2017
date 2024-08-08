package com.yeahbunny.service;

import com.yeahbunny.dao.OfferHistoryRepository;
import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.domain.OfferAcceptingHistoryEntity;
import com.yeahbunny.domain.OfferHistoryEntity;
import com.yeahbunny.domain.OfferEntity;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import javax.inject.Inject;
import java.time.ZonedDateTime;

@Service
public class OfferActivatorService {

    private static final Logger LOG = LoggerFactory.getLogger(OfferActivatorService.class);

    @Inject
    private NotifyUserService notifyUserService;

    @Inject
    private OfferRepository offerRepository;

    @Inject
    private OfferHistoryRepository activationHistoryRepository;

    @Transactional
    public void deactivateByRejectOffer(OfferEntity offerEntity, OfferAcceptingHistoryEntity offerAcceptingHistoryEntity) {
        LOG.info("Offer {} deactivating", offerEntity.getId());
        offerEntity.setActive(false);
        offerEntity.setConsumedByAdmin(true);
        this.offerRepository.save(offerEntity);

        OfferHistoryEntity historyEntity = new OfferHistoryEntity();
        historyEntity.setDeactivated(true);
        historyEntity.setOffer(offerEntity);
        historyEntity.setOfferAcceptingHistory(offerAcceptingHistoryEntity);
        historyEntity.setEventDate(ZonedDateTime.now());

        this.activationHistoryRepository.save(historyEntity);

        this.notifyUserService.notifyOfferRejectedByAdmin(historyEntity);

    }

    public void acceptOffer(OfferEntity offerEntity, OfferAcceptingHistoryEntity offerAcceptingHistoryEntity) {
        offerEntity.setConsumedByAdmin(true);
        this.offerRepository.save(offerEntity);

        OfferHistoryEntity activationHistoryEntity = new OfferHistoryEntity();
        activationHistoryEntity.setOffer(offerEntity);
        activationHistoryEntity.setDeactivated(false);
        activationHistoryEntity.setOfferAcceptingHistory(offerAcceptingHistoryEntity);

        this.activationHistoryRepository.save(activationHistoryEntity);
    }

    public void deactivateByTime(OfferEntity offerEntity) {
        offerEntity.setActive(false);
        this.offerRepository.save(offerEntity);

        OfferHistoryEntity activationHistoryEntity = new OfferHistoryEntity();
        activationHistoryEntity.setOffer(offerEntity);
        activationHistoryEntity.setDeactivated(true);

        this.activationHistoryRepository.save(activationHistoryEntity);
    }
}
