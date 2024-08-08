package com.yeahbunny.ws.dto;

import com.fasterxml.jackson.annotation.JsonProperty;
import com.fasterxml.jackson.databind.annotation.JsonDeserialize;
import com.yeahbunny.domain.*;
import com.yeahbunny.domain.type.*;
import com.yeahbunny.ws.util.BuildingTypeDeserializer;
import com.yeahbunny.ws.util.HeatingTypeDeserializer;
import com.yeahbunny.ws.util.PropertyTypeDeserializer;
import org.hibernate.validator.constraints.NotBlank;

import javax.validation.constraints.NotNull;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;

public class AddOfferRequest {

    @NotNull
    @NotBlank
    @JsonProperty(value = "tytul")
    private String title;

    @NotNull
    @JsonProperty(value = "rodzajT")
    private OfferType offerType;

    @NotNull
    @JsonProperty(value = "rodzajM")
    @JsonDeserialize(using = PropertyTypeDeserializer.class)
    private PropertyType propertyType;

    @NotNull
    @JsonProperty(value = "cena")
    private Integer priceValue;

    @NotNull
    @JsonProperty(value = "waluta")
    private CurrencyType priceCurrencyType;

    @NotNull
    @JsonProperty(value = "xx")
    private Double latitude;

    @NotNull
    @JsonProperty(value = "yy")
    private Double longitude;

    @NotBlank
    @NotNull
    @JsonProperty(value = "ulica")
    private String addressStreet;

    @NotBlank
    @NotNull
    @JsonProperty(value = "miasto")
    private String addressCity;

    @NotBlank
    @NotNull
    @JsonProperty(value = "kraj")
    private String addressCountry;

    @NotNull
    @JsonProperty(value = "photos")
    private Integer[] temporaryPhotosId;

    @NotNull
    @NotBlank
    @JsonProperty(value = "opis")
    private String description;

    @NotNull
    @JsonProperty(value = "glownyKontakt")
    private Boolean isMainContact;

    @JsonProperty(value = "imieKontakt")
    private String contactName;

    @JsonProperty(value = "emailKontakt")
    private String contactEmail;

    @JsonProperty(value = "telKontakt")
    private String contactPhoneNumber;
    private boolean autoExtend;
    private Integer propertyMaxPerson;
    private Integer propertyMinPerson;
    @JsonDeserialize(using = HeatingTypeDeserializer.class)
    private HeatingType propertyHeatingType;
    private Integer propertyFloor;
    private Boolean propertyHasBalcony;
    private Integer propertyArea;
    private Integer propertyRoomCount;
    private Integer propertyBuildYear;
    private Boolean propertyIsFurnished;
    private Boolean propertyHasLift;
    private Boolean propertyHasBasement;
    private Boolean propertyHasParking;
    private Boolean propertyAllowPets;
    private Boolean propertyHasGarden;
    private Boolean propertyHasClima;
    private Boolean propertyAllowSmoking;
    @JsonDeserialize(using = BuildingTypeDeserializer.class)
    private BuildingType propertyBuildingType;

    public OfferEntity generateEntity(PersonEntity personEntity, ContactEntity contactEntity) {
        OfferEntity offerEntity = new OfferEntity();
            offerEntity.setPerson(personEntity);
            offerEntity.setFakeLatitude(latitude+90);
            offerEntity.setFakeLongitude(longitude+180);
            offerEntity.setOfferType(offerType);
            offerEntity.setOfferActualToDate(ZonedDateTime.now().plus(30, ChronoUnit.DAYS));
            offerEntity.setTitle(title);
            offerEntity.setDescription(description);
            offerEntity.setActive(true);

                PriceEntity priceEntity = new PriceEntity();
                priceEntity.setValue(priceValue);
                priceEntity.setCurrency(priceCurrencyType);
                priceEntity.setPriceType(PriceType.MONTH);
            offerEntity.setPrice(priceEntity);

                PropertyEntity propertyEntity = new PropertyEntity();
                propertyEntity.setPropertyType(propertyType);


        propertyEntity.setMaxPerson(propertyMaxPerson);
        propertyEntity.setBuildingType(propertyBuildingType);
        propertyEntity.setMinPerson(propertyMinPerson);
        propertyEntity.setHeatingType(propertyHeatingType);
        propertyEntity.setArea(propertyArea);
        propertyEntity.setRoomCount(propertyRoomCount);
        propertyEntity.setFloor(propertyFloor);
        propertyEntity.setBuiltYear(propertyBuildYear);
        propertyEntity.setFurnished(propertyIsFurnished);
        propertyEntity.setBalcony(propertyHasBalcony);
        propertyEntity.setLift(propertyHasLift);
        propertyEntity.setBasement(propertyHasBasement);
        propertyEntity.setParkingPlace(propertyHasParking);
        propertyEntity.setPets(propertyAllowPets);
        propertyEntity.setGarden(propertyHasGarden);
        propertyEntity.setClimatisation(propertyHasClima);
        propertyEntity.setSmoking(propertyAllowSmoking);
                    AddressEntity addressEntity = new AddressEntity();
                    addressEntity.setCity(addressCity);
                    addressEntity.setCountry(addressCountry);
                    addressEntity.setStreet(addressStreet);
                propertyEntity.setAddress(addressEntity);
            offerEntity.setProperty(propertyEntity);
            offerEntity.setContact(contactEntity);
        return offerEntity;
    }

    public boolean isMainContact() {
        return isMainContact;
    }

    public String getContactName() {
        return contactName;
    }

    public String getContactEmail() {
        return contactEmail;
    }

    public String getContactPhoneNumber() {
        return contactPhoneNumber;
    }

    public Integer[] getTemporaryPhotosId() {
        return temporaryPhotosId;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public OfferType getOfferType() {
        return offerType;
    }

    public void setOfferType(OfferType offerType) {
        this.offerType = offerType;
    }

    public PropertyType getPropertyType() {
        return propertyType;
    }

    public void setPropertyType(PropertyType propertyType) {
        this.propertyType = propertyType;
    }

    public Integer getPriceValue() {
        return priceValue;
    }

    public void setPriceValue(Integer priceValue) {
        this.priceValue = priceValue;
    }

    public CurrencyType getPriceCurrencyType() {
        return priceCurrencyType;
    }

    public void setPriceCurrencyType(CurrencyType priceCurrencyType) {
        this.priceCurrencyType = priceCurrencyType;
    }

    public Double getLatitude() {
        return latitude;
    }

    public void setLatitude(Double latitude) {
        this.latitude = latitude;
    }

    public Double getLongitude() {
        return longitude;
    }

    public void setLongitude(Double longitude) {
        this.longitude = longitude;
    }

    public String getAddressStreet() {
        return addressStreet;
    }

    public void setAddressStreet(String addressStreet) {
        this.addressStreet = addressStreet;
    }

    public String getAddressCity() {
        return addressCity;
    }

    public void setAddressCity(String addressCity) {
        this.addressCity = addressCity;
    }

    public String getAddressCountry() {
        return addressCountry;
    }

    public void setAddressCountry(String addressCountry) {
        this.addressCountry = addressCountry;
    }

    public void setTemporaryPhotosId(Integer[] temporaryPhotosId) {
        this.temporaryPhotosId = temporaryPhotosId;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Boolean getMainContact() {
        return isMainContact;
    }

    public void setMainContact(Boolean mainContact) {
        isMainContact = mainContact;
    }

    public void setContactName(String contactName) {
        this.contactName = contactName;
    }

    public void setContactEmail(String contactEmail) {
        this.contactEmail = contactEmail;
    }

    public void setContactPhoneNumber(String contactPhoneNumber) {
        this.contactPhoneNumber = contactPhoneNumber;
    }

    public HeatingType getPropertyHeatingType() {
        return propertyHeatingType;
    }

    public void setPropertyHeatingType(HeatingType propertyHeatingType) {
        this.propertyHeatingType = propertyHeatingType;
    }

    public Integer getPropertyFloor() {
        return propertyFloor;
    }

    public void setPropertyFloor(Integer propertyFloor) {
        this.propertyFloor = propertyFloor;
    }

    public boolean isAutoExtend() {
        return autoExtend;
    }

    public void setAutoExtend(boolean autoExtend) {
        this.autoExtend = autoExtend;
    }

    public Integer getPropertyMaxPerson() {
        return propertyMaxPerson;
    }

    public void setPropertyMaxPerson(Integer propertyMaxPerson) {
        this.propertyMaxPerson = propertyMaxPerson;
    }

    public Integer getPropertyMinPerson() {
        return propertyMinPerson;
    }

    public void setPropertyMinPerson(Integer propertyMinPerson) {
        this.propertyMinPerson = propertyMinPerson;
    }

    public Boolean getPropertyHasBalcony() {
        return propertyHasBalcony;
    }

    public void setPropertyHasBalcony(Boolean propertyHasBalcony) {
        this.propertyHasBalcony = propertyHasBalcony;
    }

    public Integer getPropertyArea() {
        return propertyArea;
    }

    public void setPropertyArea(Integer propertyArea) {
        this.propertyArea = propertyArea;
    }

    public Integer getPropertyRoomCount() {
        return propertyRoomCount;
    }

    public void setPropertyRoomCount(Integer propertyRoomCount) {
        this.propertyRoomCount = propertyRoomCount;
    }

    public Integer getPropertyBuiltYear() {
        return propertyBuildYear;
    }

    public void setPropertyBuiltYear(Integer propertyBuiltYear) {
        this.propertyBuildYear = propertyBuiltYear;
    }

    public Boolean getPropertyIsFurnished() {
        return propertyIsFurnished;
    }

    public void setPropertyIsFurnished(Boolean propertyIsFurnished) {
        this.propertyIsFurnished = propertyIsFurnished;
    }

    public Boolean getPropertyHasLift() {
        return propertyHasLift;
    }

    public void setPropertyHasLift(Boolean propertyHasLift) {
        this.propertyHasLift = propertyHasLift;
    }

    public Boolean getPropertyHasBasement() {
        return propertyHasBasement;
    }

    public void setPropertyHasBasement(Boolean propertyHasBasement) {
        this.propertyHasBasement = propertyHasBasement;
    }

    public Boolean getPropertyHasParking() {
        return propertyHasParking;
    }

    public void setPropertyHasParking(Boolean propertyHasParking) {
        this.propertyHasParking = propertyHasParking;
    }

    public Boolean getPropertyAllowPets() {
        return propertyAllowPets;
    }

    public void setPropertyAllowPets(Boolean propertyAllowPets) {
        this.propertyAllowPets = propertyAllowPets;
    }

    public Boolean getPropertyHasGarden() {
        return propertyHasGarden;
    }

    public void setPropertyHasGarden(Boolean propertyHasGarden) {
        this.propertyHasGarden = propertyHasGarden;
    }

    public Boolean getPropertyHasClima() {
        return propertyHasClima;
    }

    public void setPropertyHasClima(Boolean propertyHasClima) {
        this.propertyHasClima = propertyHasClima;
    }

    public Boolean getPropertyAllowSmoking() {
        return propertyAllowSmoking;
    }

    public void setPropertyAllowSmoking(Boolean propertyAllowSmoking) {
        this.propertyAllowSmoking = propertyAllowSmoking;
    }

    public BuildingType getPropertyBuildingType() {
        return propertyBuildingType;
    }

    public void setPropertyBuildingType(BuildingType propertyBuildingType) {
        this.propertyBuildingType = propertyBuildingType;
    }
}



