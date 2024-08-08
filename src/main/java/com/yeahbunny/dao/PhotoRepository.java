package com.yeahbunny.dao;

import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.PhotoEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface PhotoRepository extends JpaRepository<PhotoEntity, Long> {
}
