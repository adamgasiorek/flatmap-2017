package com.yeahbunny.domain;

import com.yeahbunny.domain.type.BuildingType;
import com.yeahbunny.domain.type.HeatingType;
import com.yeahbunny.domain.type.PropertyType;
import com.yeahbunny.domain.util.BuildingTypeJpaConverter;
import com.yeahbunny.domain.util.PropertyTypeJpaConverter;

import javax.persistence.*;
import java.util.List;

@Entity
@Table(name = "property")
public class PropertyEntity extends AbstractEntity {

    @Column(name = "property_type")
    @Convert(converter = PropertyTypeJpaConverter.class)
    private PropertyType propertyType;

    @Column(name = "building_type")
    @Convert(converter = BuildingTypeJpaConverter.class)
    private BuildingType buildingType;

    @OneToOne(cascade = CascadeType.PERSIST)
    @JoinColumn(name="address_id")
    private AddressEntity address;

    @Column(name ="area")
    private Integer area;

    @Column(name ="room_count")
    private Integer roomCount;

    @Column(name ="min_person")
    private Integer minPerson;

    @Column(name ="max_person")
    private Integer maxPerson;

    @Column(name ="floor")
    private Integer floor;

    @Column(name ="lift")
    private Boolean lift;

    @Column(name ="balcony")
    private Boolean balcony;

    @Column(name ="furnished")
    private Boolean furnished;

    @Column(name ="heating_type")
    @Enumerated(EnumType.ORDINAL)
    private HeatingType heatingType;

    @Column(name ="parking_place")
    private Boolean parkingPlace;

    @Column(name ="pets")
    private Boolean pets;

    @OneToMany(mappedBy="property", cascade = CascadeType.PERSIST)
    private List<PhotoEntity> photos;

    @Column(name = "builtYear")
    private Integer builtYear;

    @Column(name = "basement")
    private Boolean basement;

    @Column(name = "garden")
    private Boolean garden;

    @Column(name = "climatisation")
    private Boolean climatisation;

    @Column(name = "smoking")
    private Boolean smoking;

    public PropertyType getPropertyType() {
        return propertyType;
    }

    public void setPropertyType(PropertyType propertyType) {
        this.propertyType = propertyType;
    }

    public List<PhotoEntity> getPhotos() {
        return photos;
    }

    public void setPhotos(List<PhotoEntity> photos) {
        this.photos = photos;
    }

    public AddressEntity getAddress() {
        return address;
    }

    public void setAddress(AddressEntity address) {
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

    public HeatingType getHeatingType() {
        return heatingType;
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

    @Override
    public String toString() {
        return "PropertyEntity{" +
                "propertyType=" + propertyType +
                ", photos=" + photos +
                '}';
    }

    public Integer getBuiltYear() {
        return builtYear;
    }

    public Boolean getBasement() {
        return basement;
    }

    public Boolean getGarden() {
        return garden;
    }

    public Boolean getClimatisation() {
        return climatisation;
    }

    public void setFurnished(Boolean furnished) {
        this.furnished = furnished;
    }

    public void setBasement(Boolean basement) {
        this.basement = basement;
    }

    public void setGarden(Boolean garden) {
        this.garden = garden;
    }

    public void setClimatisation(Boolean climatisation) {
        this.climatisation = climatisation;
    }

    public Boolean getFurnished() {
        return furnished;
    }

    public Integer getMinPerson() {
        return minPerson;
    }

    public void setMinPerson(Integer minPerson) {
        this.minPerson = minPerson;
    }

    public void setBuiltYear(Integer builtYear) {
        this.builtYear = builtYear;
    }

    public Boolean getSmoking() {
        return smoking;
    }

    public void setSmoking(Boolean smoking) {
        this.smoking = smoking;
    }

    public BuildingType getBuildingType() {
        return buildingType;
    }

    public void setBuildingType(BuildingType buildingType) {
        this.buildingType = buildingType;
    }
}
