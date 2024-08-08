package com.yeahbunny.domain;


import com.yeahbunny.domain.type.OfferType;
import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "offer")
public class OfferEntity extends AbstractEntity {

    @Column(name = "alias")
    private String alias;

    @Column(name = "offer_type")
    @Enumerated(EnumType.ORDINAL)
    private OfferType offerType;

    @Column(name = "fake_latitude")
    private double fakeLatitude;

    @Column(name = "fake_longitude")
    private double fakeLongitude;

    @Column(name = "offer_actual_to_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime offerActualToDate;

    @Column(name = "add_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime addDate;

    @Column(name = "active")
    private Boolean active;

    @Column(name = "title")
    private String title;

    @Column(name = "description")
    private String description;

    @OneToOne(cascade = CascadeType.PERSIST)
    @JoinColumn(name="price_id")
    private PriceEntity price;

    @OneToOne(cascade = CascadeType.PERSIST)
    @JoinColumn(name="property_id")
    private PropertyEntity property;

    @ManyToOne()
    @JoinColumn(name="person_id")
    private PersonEntity person;

    @ManyToOne(cascade = {CascadeType.MERGE, CascadeType.DETACH})
    @JoinColumn(name="contact_id")
    private ContactEntity contact;

    @Column(name = "views")
    private int views;

    @Column(name = "is_consumed_by_admin")
    private boolean consumedByAdmin;

    @Column(name = "was_ending_notified")
    private boolean wasEndingNotified;

    public boolean isActive() {
        return active;
    }

    public void setActive(boolean active) {
        this.active = active;
    }

    public String getAlias() {
        return alias;
    }

    public void setAlias(String alias) {
        this.alias = alias;
    }

    public OfferType getOfferType() {
        return offerType;
    }

    public void setOfferType(OfferType offerType) {
        this.offerType = offerType;
    }

    public double getFakeLatitude() {
        return fakeLatitude;
    }

    public void setFakeLatitude(double fakeLatitude) {
        this.fakeLatitude = fakeLatitude;
    }

    public double getFakeLongitude() {
        return fakeLongitude;
    }

    public void setFakeLongitude(double fakeLongitude) {
        this.fakeLongitude = fakeLongitude;
    }

    public ZonedDateTime getOfferActualToDate() {
        return offerActualToDate;
    }

    public void setOfferActualToDate(ZonedDateTime offerActualToDate) {
        this.offerActualToDate = offerActualToDate;
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

    public PropertyEntity getProperty() {
        return property;
    }

    public void setProperty(PropertyEntity property) {
        this.property = property;
    }

    public PersonEntity getPerson() {
        return person;
    }

    public void setPerson(PersonEntity person) {
        this.person = person;
    }

    public ContactEntity getContact() {
        return contact;
    }

    public void setContact(ContactEntity contact) {
        this.contact = contact;
    }

    public PriceEntity getPrice() {
        return price;
    }

    public void setPrice(PriceEntity price) {
        this.price = price;
    }

    public ZonedDateTime getAddDate() {
        return addDate;
    }

    public void setAddDate(ZonedDateTime addDate) {
        this.addDate = addDate;
    }

    public Boolean getActive() {
        return active;
    }

    public void setActive(Boolean active) {
        this.active = active;
    }

    public int getViews() {
        return views;
    }

    public void setViews(int views) {
        this.views = views;
    }

    public boolean isConsumedByAdmin() {
        return consumedByAdmin;
    }

    public void setConsumedByAdmin(boolean consumedByAdmin) {
        this.consumedByAdmin = consumedByAdmin;
    }

    public int addView() {
        this.views+=1;
        return this.views;
    }

    public boolean isWasEndingNotified() {
        return wasEndingNotified;
    }

    public void setWasEndingNotified(boolean wasEndingNotified) {
        this.wasEndingNotified = wasEndingNotified;
    }
}
