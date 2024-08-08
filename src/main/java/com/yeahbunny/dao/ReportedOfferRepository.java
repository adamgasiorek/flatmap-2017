package com.yeahbunny.dao;

import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.ReportedOfferEntity;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface ReportedOfferRepository extends JpaRepository<ReportedOfferEntity, Long> {

    List<ReportedOfferEntity> findAllByConsumedFalseOrderByReportDate();
}

