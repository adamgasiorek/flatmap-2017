package com.yeahbunny.dao;

import com.yeahbunny.domain.ForgottenPasswordTokenEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.transaction.annotation.Transactional;

import java.time.ZonedDateTime;

public interface ForgottenPasswordTokenRepository extends JpaRepository<ForgottenPasswordTokenEntity,Long> {

    @Transactional
    void deleteByPersonId(Long id);

    @Transactional
    void deleteByGenerateDateBefore(ZonedDateTime date);
}
