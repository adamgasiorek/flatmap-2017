package com.yeahbunny.security;

import com.yeahbunny.domain.PersonEntity;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;

import java.util.List;

public class PersonUserDetails extends User {

    private Long personId;

    public PersonUserDetails(PersonEntity entity, List<GrantedAuthority> roles) {
        super(entity.getEmail(),entity.getPassword(), roles);
        this.personId = entity.getId();
    }

    public Long getPersonId() {
        return personId;
    }
}
