package com.yeahbunny.scheduler;

import com.yeahbunny.service.TokenCheckingService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Component;

import javax.annotation.PostConstruct;
import javax.inject.Inject;

@Component
public class TokenCheckingScheduler {
    private final static Logger LOG = LoggerFactory.getLogger(TokenCheckingScheduler.class);

    @Inject
    public TokenCheckingService tokenCheckingService;

    @PostConstruct
    @Scheduled(cron = "0 0 * * * *")
    public void notifyUsers() {

        LOG.info("Schedules job: checking if activation and password tokens are actually");

        tokenCheckingService.execute();

    }
}
