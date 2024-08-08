package com.yeahbunny.service;

import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.domain.OfferEntity;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.inject.Inject;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;

@Service
public class OfferActualUpdaterService {

    @Inject
    OfferRepository offerRepository;


    @Inject
    OfferExtenderService offerExtenderService;

    @Inject
    OfferActivatorService offerActivatorService;

    @Inject
    NotifyUserService notifyUserService;



    @Value("${app.offer.durability.end}")
    private int offerDurability;

    @Value("${app.offer.durability.notify}")
    private int offerDurabilityNotify;

    @Value("${app.offer.price}")
    private int offerPrice;

    private final static Logger LOG = LoggerFactory.getLogger(OfferActualUpdaterService.class);

    public void execute(){

        this.offerRepository.findAllByActiveTrue()
            .stream()
            .filter(offerEntity ->{
                return offerEntity.getOfferActualToDate().isBefore(ZonedDateTime.now(offerEntity.getOfferActualToDate().getZone()).plus(offerDurabilityNotify, ChronoUnit.DAYS));
            }).forEach(offerEntity->{
            if(checkIfShouldNotify(offerEntity)){
                LOG.info("Offer id {} is coming out of date in a few days", offerEntity.getId());
                notifyUserService.notifyEndOfOfferIncoming(offerEntity);
            }

            if(checkIfShouldDeactive(offerEntity)){
                LOG.info("Deactivation offer id {} cause its out of date", offerEntity.getId());
                offerActivatorService.deactivateByTime(offerEntity);
            }
        });

    }

    private boolean checkIfShouldNotify(OfferEntity offerEntity) {
        return !offerEntity.isWasEndingNotified();
    }

    private boolean checkIfShouldDeactive(OfferEntity offerEntity) {
          return offerEntity.getOfferActualToDate().isBefore(ZonedDateTime.now(offerEntity.getOfferActualToDate().getZone()));
    }
}
