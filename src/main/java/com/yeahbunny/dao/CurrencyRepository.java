package com.yeahbunny.dao;

import com.yeahbunny.domain.CurrencyEntity;
import org.springframework.data.jpa.repository.JpaRepository;

/**
 * Created by kroli on 31.12.2016.
 */
public interface CurrencyRepository extends JpaRepository<CurrencyEntity, String> {
}
