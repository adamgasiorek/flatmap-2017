package com.yeahbunny.dao;

import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.domain.PersonEntity;
import org.springframework.data.jpa.repository.JpaRepository;

/**
 * Created by kroli on 26.01.2017.
 */
public interface AdminRepository extends JpaRepository<AdminEntity, Long>{
    AdminEntity findByEmail(String email);
}
