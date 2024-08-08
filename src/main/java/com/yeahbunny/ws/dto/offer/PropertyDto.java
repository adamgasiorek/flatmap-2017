package com.yeahbunny.ws.dto.offer;

import com.fasterxml.jackson.databind.annotation.JsonSerialize;
import com.yeahbunny.domain.type.BuildingType;
import com.yeahbunny.domain.type.HeatingType;
import com.yeahbunny.domain.type.PropertyType;
import com.yeahbunny.ws.util.BuildingTypeJsonSerializer;

import java.util.List;

public class PropertyDto {

    private PropertyType propertyType;
    private BuildingType buildingType;
    private AddressDto address;
    private Integer area;
    private Integer roomCount;
    private Integer maxPerson;
    private Integer floor;
    private Boolean lift;
    private Boolean balcony;
    private Boolean furnished;
    private HeatingType heatingType;
    private Boolean parkingPlace;
    private Boolean pets;
    private List<PhotoDto> photos;
    private Integer builtYear;
    private Boolean basement;
    private Boolean garden;
    private Boolean climatisation;

    public int getPropertyType() {
        return propertyType.getValue();
    }

    public void setPropertyType(PropertyType propertyType) {
        this.propertyType = propertyType;
    }

    public Integer getBuildingType() {
            if(buildingType == null){
                return null;
            }else{
                return buildingType.getValue();
            }
    }

    public void setBuildingType(BuildingType buildingType) {
        this.buildingType = buildingType;
    }

    public AddressDto getAddress() {
        return address;
    }

    public void setAddress(AddressDto address) {
        this.address = address;
    }

    public Integer getArea() {
        return area;
    }

    public void setArea(Integer area) {
        this.area = area;
    }

    public Integer getRoomCount() {
        return roomCount;
    }

    public void setRoomCount(Integer roomCount) {
        this.roomCount = roomCount;
    }

    public Integer getMaxPerson() {
        return maxPerson;
    }

    public void setMaxPerson(Integer maxPerson) {
        this.maxPerson = maxPerson;
    }

    public Integer getFloor() {
        return floor;
    }

    public void setFloor(Integer floor) {
        this.floor = floor;
    }

    public Boolean getLift() {
        return lift;
    }

    public void setLift(Boolean lift) {
        this.lift = lift;
    }

    public Boolean getBalcony() {
        return balcony;
    }

    public void setBalcony(Boolean balcony) {
        this.balcony = balcony;
    }

    public Integer getHeatingType() {
        if(heatingType == null){
            return null;
        }else{
            return heatingType.ordinal();
        }
    }

    public void setHeatingType(HeatingType heatingType) {
        this.heatingType = heatingType;
    }

    public Boolean getParkingPlace() {
        return parkingPlace;
    }

    public void setParkingPlace(Boolean parkingPlace) {
        this.parkingPlace = parkingPlace;
    }

    public Boolean getPets() {
        return pets;
    }

    public void setPets(Boolean pets) {
        this.pets = pets;
    }

    public List<PhotoDto> getPhotos() {
        return photos;
    }

    public void setPhotos(List<PhotoDto> photos) {
        this.photos = photos;
    }

    public Boolean getFurnished() {
        return furnished;
    }

    public void setFurnished(Boolean furnished) {
        this.furnished = furnished;
    }

    public Integer getBuiltYear() {
        return builtYear;
    }

    public void setBuiltYear(Integer builtYear) {
        this.builtYear = builtYear;
    }

    public Boolean getBasement() {
        return basement;
    }

    public void setBasement(Boolean basement) {
        this.basement = basement;
    }

    public Boolean getGarden() {
        return garden;
    }

    public void setGarden(Boolean garden) {
        this.garden = garden;
    }

    public Boolean getClimatisation() {
        return climatisation;
    }

    public void setClimatisation(Boolean climatisation) {
        this.climatisation = climatisation;
    }
}
