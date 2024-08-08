package com.yeahbunny.dao;

import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.ws.dto.MapMarker;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import java.util.List;
import java.util.stream.Stream;

public interface OfferRepository extends JpaRepository<OfferEntity, Long> {

    List<OfferEntity> findAllByActiveTrueAndFakeLatitudeBetweenAndFakeLongitudeBetween(double x1, double x2, double y1, double y2);

    OfferEntity findByAlias(String id);

    List<OfferEntity> findAllByPersonId(Long personId);


    List<OfferEntity> findAllByConsumedByAdminFalseAndActiveTrue();

    List<OfferEntity> findAllByActiveTrue();
}

