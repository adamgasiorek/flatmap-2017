package com.yeahbunny.ws;

import com.yeahbunny.ws.dto.LoginRequest;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.web.authentication.logout.SecurityContextLogoutHandler;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.context.request.RequestContextHolder;

import javax.inject.Inject;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.validation.Valid;

@RestController
@RequestMapping(value = "/person/session")
public class PersonSessionController {

    private static final Logger LOG = LoggerFactory.getLogger(PersonSessionController.class);

    @Inject
    @Qualifier("personAuthenticationManager")
    private AuthenticationManager authenticationManager;

    @RequestMapping(value = "/login", method = RequestMethod.POST)
    @ResponseBody
    public ResponseEntity<String> login(@RequestBody @Valid LoginRequest userLoginRequest) {

        LOG.info("User logging in: {} {}", userLoginRequest.getLogin(),  userLoginRequest.getPassword());
        UsernamePasswordAuthenticationToken token = new UsernamePasswordAuthenticationToken(userLoginRequest.getLogin(), userLoginRequest.getPassword());
        Authentication a = authenticationManager.authenticate(token);

        SecurityContextHolder.getContext().setAuthentication(a);
        return ResponseEntity.ok().body(RequestContextHolder.currentRequestAttributes().getSessionId());
    }

    @RequestMapping(value = "/logout", method = RequestMethod.POST)
    public void logout (HttpServletRequest request, HttpServletResponse response) {
        Authentication auth = SecurityContextHolder.getContext().getAuthentication();
        if (auth != null){
            new SecurityContextLogoutHandler().logout(request, response, auth);
        }
    }
}
