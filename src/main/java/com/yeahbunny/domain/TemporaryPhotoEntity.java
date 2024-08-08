package com.yeahbunny.domain;

import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "temporary_photo")
public class TemporaryPhotoEntity extends AbstractEntity {

    @ManyToOne(fetch= FetchType.LAZY)
    @JoinColumn(name="person_id")
    private PersonEntity person;

    @Column(name = "url")
    private String url;

    @Column(name = "thumb_url")
    private String thumbUrl;

    @Column(name = "store_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime storeDate;

    public PersonEntity getPerson() {
        return person;
    }

    public void setPerson(PersonEntity person) {
        this.person = person;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getThumbUrl() {
        return thumbUrl;
    }

    public void setThumbUrl(String thumbUrl) {
        this.thumbUrl = thumbUrl;
    }

    public ZonedDateTime getStoreDate() {
        return storeDate;
    }

    public void setStoreDate(ZonedDateTime storeDate) {
        this.storeDate = storeDate;
    }
}
