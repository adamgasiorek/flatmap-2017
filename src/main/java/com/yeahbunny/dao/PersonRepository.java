package com.yeahbunny.dao;

import com.yeahbunny.domain.PersonEntity;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface PersonRepository extends JpaRepository<PersonEntity, Long> {
    PersonEntity findByEmail(String email);

    List<PersonEntity> findByEmailContaining(String email);
}
