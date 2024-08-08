package com.yeahbunny.ws.util;

import com.yeahbunny.dao.AdminRepository;
import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.security.AdminUserDetails;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Component;

import javax.inject.Inject;

@Component
public class AdminPrincipalProvider implements PrincipalProvider{
    @Inject
    AdminRepository adminRepository;

    public AdminEntity getEntity(){
        Long id =  ((AdminUserDetails) SecurityContextHolder.getContext().getAuthentication().getPrincipal()).getAdminId();
        return adminRepository.findOne(id);
    }
}
