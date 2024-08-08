package com.yeahbunny.security;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.http.HttpMethod;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

import org.springframework.security.web.AuthenticationEntryPoint;
import org.springframework.security.web.savedrequest.NullRequestCache;
import org.springframework.security.web.util.matcher.AntPathRequestMatcher;
import org.springframework.session.MapSessionRepository;
import org.springframework.session.SessionRepository;
import org.springframework.session.web.http.HeaderHttpSessionStrategy;
import org.springframework.session.web.http.SessionRepositoryFilter;

import javax.inject.Inject;


@Configuration
@EnableWebSecurity
public class AuthenticationConfig extends WebSecurityConfigurerAdapter {

    @Override
    protected void configure(HttpSecurity http) throws Exception {
        http
                .requestMatcher(new AntPathRequestMatcher("/**"))
                .authorizeRequests()
                .antMatchers(HttpMethod.OPTIONS, "/**").permitAll()
                .antMatchers("/person/session/login").permitAll()
                .antMatchers("/marker/**").permitAll()
                .antMatchers("/offer/**").permitAll()
                .antMatchers("/test/**").permitAll()
                .antMatchers("/photo/**").permitAll()
                .antMatchers("/register").permitAll()
                .antMatchers("/register/activateMail").permitAll()
                .antMatchers("/forgottenPassword").permitAll()
                .antMatchers("/forgottenPassword/changePassword").permitAll()
                .antMatchers("/forgottenPassword/cancel").permitAll()
                .antMatchers("/admin/session/login").permitAll()
                .antMatchers("/admin/**").hasAuthority(AppRoles.ADMIN)
               // .anyRequest().hasAnyRole(AppRoles.USER)
                .anyRequest().permitAll()
                .and()
                .requestCache()
                .requestCache(new NullRequestCache())
                .and()
                .exceptionHandling()
                .authenticationEntryPoint(getNotAuthorizedEntryPoint())
                .and()
                .csrf().disable();

    }

    @Inject
    public void configureGlobal(AuthenticationManagerBuilder auth) throws Exception {
        auth.inMemoryAuthentication();
    }

    /**
     * Create Spring-session filter that replaces HttpSession with Spring implementation. Entry point for spring session
     * @return
     */
    @Bean
    SessionRepositoryFilter filter() {
        SessionRepositoryFilter filter = new SessionRepositoryFilter(sessionRepo());
        filter.setHttpSessionStrategy(sessionStrategy());
        return filter;
    }

    @Bean
    SessionRepository sessionRepo() {
        return new MapSessionRepository();
    }

    @Bean
    public HeaderHttpSessionStrategy sessionStrategy() {
        return new HeaderHttpSessionStrategy();
    }

    private static AuthenticationEntryPoint getNotAuthorizedEntryPoint() {
        return new CustomHttp403ForbiddenEntryPoint();
    }
}