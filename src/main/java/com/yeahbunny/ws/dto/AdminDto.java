package com.yeahbunny.ws.dto;

import com.yeahbunny.domain.AdminEntity;

public class AdminDto {

    private String name;
    private String email;

    public AdminDto(AdminEntity adminEntity) {
        this.name = adminEntity.getName();
        this.email = adminEntity.getEmail();
    }

    public String getName() {
        return name;
    }

    public String getEmail() {
        return email;
    }
}
