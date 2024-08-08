package com.yeahbunny.ws.util;

import com.yeahbunny.dao.PersonRepository;
import com.yeahbunny.domain.PersonEntity;
import com.yeahbunny.security.PersonUserDetails;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Component;

import javax.inject.Inject;

@Component
public class PersonPrincipalProvider implements PrincipalProvider {

    @Inject
    PersonRepository personRepository;

    public PersonEntity getEntity(){
        Long id =  ((PersonUserDetails) SecurityContextHolder.getContext().getAuthentication().getPrincipal()).getPersonId();
        return personRepository.findOne(id);
    }
}

