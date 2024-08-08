package com.yeahbunny.scheduler;

import com.yeahbunny.service.OfferActualUpdaterService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Component;

import javax.annotation.PostConstruct;
import javax.inject.Inject;

@Component
public class CheckOffersActiveScheduler {
    private final static Logger LOG = LoggerFactory.getLogger(CheckOffersActiveScheduler.class);

    @Inject
    public OfferActualUpdaterService offerActualUpdaterService;

    @PostConstruct
    @Scheduled(cron = "0 0 1 * * *")
    public void notifyUsers() {

        LOG.info("Schedules job: checking if offers are actually");

        offerActualUpdaterService.execute();

    }
}
