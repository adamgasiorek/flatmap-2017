package com.yeahbunny.dao;

import com.yeahbunny.domain.ActivationTokenEntity;
import com.yeahbunny.domain.PersonEntity;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;


public interface ActivationTokenRepository extends JpaRepository<ActivationTokenEntity, Long> {

    void deleteByPersonId(Long id);

    List<ActivationTokenEntity> findAllByPersonId(Long id);

    ActivationTokenEntity findByIdAndToken(Long id, String token);
}
