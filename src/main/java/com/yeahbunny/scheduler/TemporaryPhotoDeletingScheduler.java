package com.yeahbunny.scheduler;

import com.yeahbunny.service.TemporaryPhotoDeletingService;
import com.yeahbunny.service.TokenCheckingService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Component;

import javax.annotation.PostConstruct;
import javax.inject.Inject;

@Component
public class TemporaryPhotoDeletingScheduler {
    private final static Logger LOG = LoggerFactory.getLogger(TemporaryPhotoDeletingScheduler.class);

    @Inject
    public TemporaryPhotoDeletingService temporaryPhotoDeletingService;

    @PostConstruct
    @Scheduled(cron = "0 0 2 * * *")
    public void notifyUsers() {

        LOG.info("Schedules job: clearing temporary photos");

        temporaryPhotoDeletingService.execute();

    }
}
