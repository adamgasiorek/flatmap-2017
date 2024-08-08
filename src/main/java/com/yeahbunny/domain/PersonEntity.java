package com.yeahbunny.domain;

import javax.persistence.*;


@Entity
@Table(name = "person")
public class PersonEntity extends AbstractEntity {

    @Column(name = "email")
    private String email;

    @Column(name = "password")
    private String password;

    @Column(name = "name")
    private String name;

    @ManyToOne(cascade = {CascadeType.MERGE, CascadeType.DETACH})
    @JoinColumn(name="contact_id")
    private ContactEntity contact;

    @Column(name = "is_activated")
    private boolean activated;

    @Column(name = "points")
    private int points;

    @Column(name = "is_agency")
    private boolean isAgency;

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public ContactEntity getContact() {
        return contact;
    }

    public void setContact(ContactEntity contact) {
        this.contact = contact;
    }

    public boolean isActivated() {
        return activated;
    }

    public boolean getActivated() {
        return activated;
    }

    public void setActivated(boolean activated) {
        this.activated = activated;
    }

    public int getPoints() {
        return points;
    }

    public void setPoints(int points) {
        this.points = points;
    }

    public int addPoints(int i) {
        this.points = this.points +i;
        return this.points;
    }

    public void setIsAgency(boolean agency) {
        isAgency = agency;
    }

    public boolean getIsAgency() {
        return isAgency;
    }
}
