package com.yeahbunny.ws;

import com.yeahbunny.dao.AdminRepository;
import com.yeahbunny.domain.AdminEntity;
import com.yeahbunny.ws.dto.AdminDto;
import com.yeahbunny.ws.util.AdminPrincipalProvider;
import org.hibernate.annotations.Index;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import javax.inject.Inject;

@RestController
@RequestMapping(value = "/admin/account")
public class AdminAccountController {

    @Inject
    AdminPrincipalProvider principalProvider;

    @Inject
    AdminRepository adminRepository;

    @RequestMapping(value = "/get", method = RequestMethod.GET)
    @ResponseBody
    public AdminDto getMyAdminAccount(){
    AdminEntity adminEntity = principalProvider.getEntity();

    return new AdminDto(adminEntity);
    }
}
