package com.yeahbunny.dao;


import com.yeahbunny.domain.OfferHistoryEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface OfferHistoryRepository extends JpaRepository<OfferHistoryEntity, Long> {
}
