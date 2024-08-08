package com.yeahbunny.ws.dto;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.type.OfferType;
import com.yeahbunny.domain.type.PropertyType;

public class MapMarker{
    private Long id;
    private int offerType;
    private int propertyType;
    private double latitude;
    private double longitude;

    public MapMarker(Long id, OfferType offerType, PropertyType propertyPropertyType, double fakeLatitude, double fakeLongitude) {
        this.id = id;
        this.offerType = offerType.ordinal();
        this.propertyType = propertyPropertyType.getValue();
        this.latitude = fakeLatitude -90;
        this.longitude = fakeLongitude -180;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public int getOfferType() {
        return offerType;
    }

    public void setOfferType(OfferType offerType) {
        this.offerType = offerType.ordinal();
    }

    public int getPropertyType() {
        return propertyType;
    }

    public void setPropertyType(PropertyType propertyType) {
        this.propertyType = propertyType.getValue();
    }

    public double getLatitude() {
        return latitude;
    }

    public void setLatitude(double latitude) {
        this.latitude = latitude;
    }

    public double getLongitude() {
        return longitude;
    }

    public void setLongitude(double longitude) {
        this.longitude = longitude;
    }

    @JsonIgnore
    public double getFakeLatitude() {
        return this.latitude+90;
    }

    @JsonIgnore
    public double getFakeLongitude() {
        return this.longitude+180;
    }

    @JsonIgnore
    public static MapMarker generate(OfferEntity offer){
        return new MapMarker(offer.getId(),offer.getOfferType(),offer.getProperty().getPropertyType(), offer.getFakeLatitude(),offer.getFakeLongitude());

    }
}
