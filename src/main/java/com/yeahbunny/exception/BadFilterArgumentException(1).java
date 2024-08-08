package com.yeahbunny.exception;

public class BadFilterArgumentException extends NumberFormatException{

    public BadFilterArgumentException(String key, String value, Class<?> targetClass) {
        super("Cannot convert param with key: " + key + " and value: " + value + " to " + targetClass.getName());
    }

    public BadFilterArgumentException(String key) {
        super("Unknown key: " + key);
    }
}
