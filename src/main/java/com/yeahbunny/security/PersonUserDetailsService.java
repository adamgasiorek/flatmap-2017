package com.yeahbunny.security;

import com.yeahbunny.dao.PersonRepository;
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
public class PersonUserDetailsService implements UserDetailsService {

    private static final Logger LOG = LoggerFactory.getLogger(PersonUserDetailsService.class);

    @Inject
    PersonRepository personRepository;

    @Override
    public UserDetails loadUserByUsername(String email) throws UsernameNotFoundException {
        PersonEntity entity = personRepository.findByEmail(email);

        if(entity == null){
            throw new UsernameNotFoundException("USER_NOT_FOUND");
        }

        List<GrantedAuthority> roles = new ArrayList<>();
        roles.add(new SimpleGrantedAuthority(AppRoles.USER));
        return new PersonUserDetails(entity, roles);
    }


}