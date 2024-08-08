package com.yeahbunny.security;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.ProviderManager;
import org.springframework.security.authentication.dao.DaoAuthenticationProvider;

import javax.inject.Inject;
import java.util.Arrays;

@Configuration
public class AuthenticationMenagerConfig {

    @Bean(name = "personAuthenticationManager")
    @Inject
    AuthenticationManager userAuthenticationManager(PersonUserDetailsService personUserDetailsService){

        DaoAuthenticationProvider userAuthProvider = new DaoAuthenticationProvider();
        userAuthProvider.setUserDetailsService(personUserDetailsService);
        return new ProviderManager(Arrays.asList(userAuthProvider));
    }

    @Bean(name = "adminAuthenticationManager")
    @Inject
    AuthenticationManager adminAuthenticationManager(AdminUserDetailsService adminUserDetailsService){

        DaoAuthenticationProvider adminAuthProvider = new DaoAuthenticationProvider();
        adminAuthProvider.setUserDetailsService(adminUserDetailsService);

        return new ProviderManager(Arrays.asList(adminAuthProvider));
    }
}
