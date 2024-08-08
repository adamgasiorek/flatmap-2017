package com.yeahbunny.domain;

import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "forgotten_password_token")
public class ForgottenPasswordTokenEntity extends AbstractEntity {

    @Column(name = "token")
    private String token;

    @ManyToOne()
    @JoinColumn(name="person_id")
    private PersonEntity person;

    @Column(name = "generate_date")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime generateDate;

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }

    public PersonEntity getPerson() {
        return person;
    }

    public void setPerson(PersonEntity person) {
        this.person = person;
    }

    public ZonedDateTime getGenerateDate() {
        return generateDate;
    }

    public void setGenerateDate(ZonedDateTime generateDate) {
        this.generateDate = generateDate;
    }
}
