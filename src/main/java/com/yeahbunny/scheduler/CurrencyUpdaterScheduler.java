package com.yeahbunny.scheduler;


import com.yeahbunny.service.CurrencyUpdaterService;


import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Component;

import javax.annotation.PostConstruct;
import javax.inject.Inject;

@Component
public class CurrencyUpdaterScheduler {
    private final static Logger LOG = LoggerFactory.getLogger(CurrencyUpdaterScheduler.class);

    @Inject
    public CurrencyUpdaterService currencyUpdaterService;

    @PostConstruct
    @Scheduled(cron = "0 0 4 * * *")
    public void notifyUsers() {

        LOG.info("Schedules job: checking currency ");

        currencyUpdaterService.execute();

    }
}
