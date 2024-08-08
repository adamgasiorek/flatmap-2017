package com.yeahbunny.ws.dto.offer;

import com.fasterxml.jackson.annotation.JsonProperty;
import com.fasterxml.jackson.databind.annotation.JsonSerialize;
import com.yeahbunny.domain.type.OfferType;
import com.yeahbunny.ws.util.Java8DateTimeJsonSerializer;

import javax.persistence.Column;
import java.time.ZonedDateTime;

public class OfferDto {
    private Long id;
    @JsonProperty(value = "latitude")
    private double fakeLatitude;
    @JsonProperty(value = "longitude")
    private double fakeLongitude;
    private OfferType offerType;
    @JsonSerialize(using= Java8DateTimeJsonSerializer.class)
    private ZonedDateTime addDate;
    private String title;
    private String description;
    private int views;
    private PriceDto price;
    private PersonDto person;
    private ContactDto contact;
    private PropertyDto property;



    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public int getOfferType() {
        return offerType.ordinal();
    }

    public void setOfferType(OfferType offerType) {
        this.offerType = offerType;
    }
    
    public void setAddDate(ZonedDateTime startDate) {
        this.addDate = startDate;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public PriceDto getPrice() {
        return price;
    }

    public void setPrice(PriceDto price) {
        this.price = price;
    }

    public PropertyDto getProperty() {
        return property;
    }

    public void setProperty(PropertyDto property) {
        this.property = property;
    }

    public ContactDto getContact() {
        return contact;
    }

    public void setContact(ContactDto contact) {
        this.contact = contact;
    }

    public PersonDto getPerson() {
        return person;
    }

    public void setPerson(PersonDto person) {
        this.person = person;
    }

    public ZonedDateTime getAddDate() {
        return addDate;
    }

    public int getViews() {
        return views;
    }

    public void setViews(int views) {
        this.views = views;
    }

    public double getFakeLatitude() {
        return fakeLatitude - 90;
    }

    public void setFakeLatitude(double fakeLatitude) {
        this.fakeLatitude = fakeLatitude;
    }

    public double getFakeLongitude() {
        return fakeLongitude -180;
    }

    public void setFakeLongitude(double fakeLongitude) {
        this.fakeLongitude = fakeLongitude;
    }
}
