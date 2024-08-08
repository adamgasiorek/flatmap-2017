package com.yeahbunny.service;

import com.yeahbunny.dao.ForgottenPasswordTokenRepository;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;

import javax.inject.Inject;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;

@Service
public class TokenCheckingService {
    private final static Logger LOG = LoggerFactory.getLogger(TokenCheckingService.class);

    @Inject
    ForgottenPasswordTokenRepository forgottenPasswordTokenRepository;

    public void execute() {



        ZonedDateTime date = ZonedDateTime.now().minus(24, ChronoUnit.HOURS);
        forgottenPasswordTokenRepository.deleteByGenerateDateBefore(date);
    }
}
