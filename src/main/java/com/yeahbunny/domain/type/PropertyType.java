package com.yeahbunny.domain.type;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

public class PropertyType {
    private static final Logger LOG = LoggerFactory.getLogger(PropertyType.class);
    private static Map<String, PropertyType> keyValuesMap;
    public final static PropertyType HOUSE;
    public final static PropertyType FLAT;
    public final static PropertyType ROOM;
    public final static PropertyType PARCEL;
    public final static PropertyType GARAGE;
    public final static PropertyType LOCAL;
    static{
        LOG.debug("INIT");
        keyValuesMap = new HashMap<>();
        keyValuesMap.put("HOUSE",new PropertyType(0));
        keyValuesMap.put("FLAT",new PropertyType(50));
        keyValuesMap.put("ROOM",new PropertyType(100));
        keyValuesMap.put("PARCEL", new PropertyType(150));
        keyValuesMap.put("GARAGE",new PropertyType(200));
        keyValuesMap.put("LOCAL", new PropertyType(250));

        HOUSE = keyValuesMap.get("HOUSE");
        ROOM = keyValuesMap.get("ROOM");
        FLAT = keyValuesMap.get("FLAT");
        PARCEL= keyValuesMap.get("PARCEL");
        GARAGE = keyValuesMap.get("GARAGE");
        LOCAL = keyValuesMap.get("LOCAL");

    }

    private final int value;
    private PropertyType(int value){
        this.value = value;
    }


    public static PropertyType get(int value) {
        Optional<Map.Entry<String, PropertyType>> optional = keyValuesMap.entrySet().stream().filter(entry -> {
            return entry.getValue().getValue() == value;
        }).findFirst();

        if (optional.isPresent()) {
            return optional.get().getValue();
        }else {
            throw new IndexOutOfBoundsException("Property type with value " + value + " does not exists");
        }
    }

    public int getValue() {
        return value;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        PropertyType that = (PropertyType) o;

        return value == that.value;

    }

    @Override
    public int hashCode() {
        return value;
    }
}
