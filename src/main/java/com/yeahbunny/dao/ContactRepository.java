package com.yeahbunny.dao;

import com.yeahbunny.domain.ContactEntity;
import com.yeahbunny.domain.OfferEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ContactRepository extends JpaRepository<ContactEntity, Long> {
}
