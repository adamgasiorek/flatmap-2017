package com.yeahbunny.security;

import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.domain.PersonEntity;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;

import java.util.List;

/**
 * Created by kroli on 26.01.2017.
 */
public class AdminUserDetails extends User {
    private Long adminId;

    public AdminUserDetails(AdminEntity entity, List<GrantedAuthority> roles) {
        super(entity.getEmail(), entity.getPassword(),roles);
        this.adminId = entity.getId();
    }

    public Long getAdminId() {
        return adminId;
    }
}
