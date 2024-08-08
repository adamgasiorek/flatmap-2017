package com.yeahbunny.service;

import java.util.UUID;

public class TokenBuilderService {

    public static String buildToken() {
        return UUID.randomUUID().toString().replaceAll("-", "");
    }
}
