package com.yeahbunny.security;

import com.yeahbunny.dao.AdminRepository;
import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.domain.PersonEntity;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Component;

import javax.inject.Inject;
import java.util.ArrayList;
import java.util.List;

@Component
public class AdminUserDetailsService implements UserDetailsService {

    private static final Logger LOG = LoggerFactory.getLogger(AdminUserDetailsService.class);

    @Inject
    AdminRepository adminRepository;

    @Override
    public UserDetails loadUserByUsername(String email) throws UsernameNotFoundException {

        AdminEntity entity = adminRepository.findByEmail(email);

        if(entity == null){
            throw new UsernameNotFoundException("ADMIN_NOT_FOUND");
        }

        LOG.debug("admin "  + entity.getEmail() + " " + entity.getPassword());

        List<GrantedAuthority> roles = new ArrayList<>();
        roles.add(new SimpleGrantedAuthority(AppRoles.ADMIN));

        return new AdminUserDetails(entity, roles);
    }


}
