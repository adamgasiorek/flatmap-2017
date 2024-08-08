package com.yeahbunny.domain.type;

import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

/**
 * Created by kroli on 15.01.2017.
 */
public class BuildingType {
    private static Map<String, BuildingType> keyValuesMap;
    public final static BuildingType HOUSE_DETACHED;
    public final static BuildingType HOUSE_SEMI_DETACHED;
    public final static BuildingType HOUSE_TERRACED;
    public final static BuildingType HOUSE_SUMMER;

    public final static BuildingType FLAT_BLOCK;
    public final static BuildingType FLAT_TENEMENT;

    public final static BuildingType ROOM_BLOCK;
    public final static BuildingType ROOM_TENEMENT;

    public final static BuildingType PARCEL_BUILDING;
    public final static BuildingType PARCEL_AGRICULTURAL;
    public final static BuildingType PARCEL_SUMMER;

    public final static BuildingType GARAGE_DETACHED;
    public final static BuildingType GARAGE_PARKINGPLACE;
    public final static BuildingType GARAGE_PARKING;

    public final static BuildingType LOCAL_SHOP;
    public final static BuildingType LOCAL_OFFICE;
    public final static BuildingType LOCAL_STOREHOUSE;
    public final static BuildingType LOCAL_HALL;
    public final static BuildingType LOCAL_OTHER;

    static{
        keyValuesMap = new HashMap<String, BuildingType>();

        HOUSE_DETACHED = keyValuesMap.put("HOUSE_DETACHED",new BuildingType(0));
        HOUSE_SEMI_DETACHED = keyValuesMap.put("HOUSE_SEMI_DETACHED",new BuildingType(1));
        HOUSE_TERRACED = keyValuesMap.put("HOUSE_TERRACED",new BuildingType(2));
        HOUSE_SUMMER = keyValuesMap.put("HOUSE_SUMMER",new BuildingType(3));

        FLAT_BLOCK = keyValuesMap.put("FLAT_BLOCK",new BuildingType(50));
        FLAT_TENEMENT = keyValuesMap.put("FLAT_TENEMENT",new BuildingType(51));

        ROOM_BLOCK = keyValuesMap.put("ROOM_BLOCK",new BuildingType(100));
        ROOM_TENEMENT = keyValuesMap.put("ROOM_TENEMENT",new BuildingType(101));

        PARCEL_BUILDING = keyValuesMap.put("PARCEL_BUILDING",new BuildingType(150));
        PARCEL_AGRICULTURAL = keyValuesMap.put("PARCEL_AGRICULTURAL",new BuildingType(151));
        PARCEL_SUMMER = keyValuesMap.put("PARCEL_SUMMER",new BuildingType(152));

        GARAGE_DETACHED = keyValuesMap.put("GARAGE_DETACHED",new BuildingType(200));
        GARAGE_PARKINGPLACE = keyValuesMap.put("GARAGE_PARKINGPLACE",new BuildingType(201));
        GARAGE_PARKING = keyValuesMap.put("GARAGE_PARKING",new BuildingType(202));

        LOCAL_SHOP = keyValuesMap.put("LOCAL_SHOP",new BuildingType(250));
        LOCAL_OFFICE = keyValuesMap.put("LOCAL_OFFICE",new BuildingType(251));
        LOCAL_STOREHOUSE = keyValuesMap.put("LOCAL_STOREHOUSE",new BuildingType(252));
        LOCAL_HALL = keyValuesMap.put("LOCAL_HALL",new BuildingType(253));
        LOCAL_OTHER = keyValuesMap.put("LOCAL_OTHER",new BuildingType(254));
    }


    private final int value;
    private BuildingType(int value){
        this.value = value;
    }


    public static BuildingType get(int value) {
        Optional<Map.Entry<String, BuildingType>> optional = keyValuesMap.entrySet().stream().filter(entry -> {
            return entry.getValue().getValue() == value;
        }).findFirst();

        if (optional.isPresent()) {
            return optional.get().getValue();
        }else {
            throw new IndexOutOfBoundsException("Building type with value " + value + " does not exists");
        }
    }

    public int getValue() {
        return value;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        BuildingType that = (BuildingType) o;

        return value == that.value;

    }

    @Override
    public int hashCode() {
        return value;
    }
}
