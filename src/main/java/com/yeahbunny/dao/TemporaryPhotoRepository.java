package com.yeahbunny.dao;

import com.yeahbunny.domain.PhotoEntity;
import com.yeahbunny.domain.TemporaryPhotoEntity;
import org.springframework.data.jpa.repository.JpaRepository;

import java.time.ZonedDateTime;
import java.util.List;

public interface TemporaryPhotoRepository extends JpaRepository<TemporaryPhotoEntity, Long> {
    List<TemporaryPhotoEntity> findAllByPersonId(Long personId);

    List<TemporaryPhotoEntity> findAllByStoreDateBefore(ZonedDateTime storeDate);


}
