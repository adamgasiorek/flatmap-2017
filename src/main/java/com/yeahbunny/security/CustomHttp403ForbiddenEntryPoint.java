package com.yeahbunny.security;

import org.springframework.security.core.AuthenticationException;
import org.springframework.security.web.authentication.Http403ForbiddenEntryPoint;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

public class CustomHttp403ForbiddenEntryPoint extends Http403ForbiddenEntryPoint {

    public static final String INVALID_DATA = "INVALID_DATA";

    @Override
    public void commence(HttpServletRequest request, HttpServletResponse response, AuthenticationException arg2) throws IOException, ServletException {
        response.sendError(403, INVALID_DATA);
    }
}
