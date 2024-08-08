package com.yeahbunny.domain;

import com.yeahbunny.domain.util.Java8DateTimeJpaConverter;

import javax.persistence.*;
import java.time.ZonedDateTime;

@Entity
@Table(name = "offers_photo")
public class PhotoEntity extends AbstractEntity {

    @ManyToOne(fetch= FetchType.LAZY)
    @JoinColumn(name="property_id")
    private PropertyEntity property;

    @Column(name = "url")
    private String url;

    @Column(name = "thumb_url")
    private String thumbUrl;

    @Column(name = "store_date", nullable = false, columnDefinition = "timestamp")
    @Convert(converter = Java8DateTimeJpaConverter.class)
    private ZonedDateTime storeDate;

    @Column(name = "priority")
    private int priority;

    public PropertyEntity getProperty() {
        return property;
    }

    public void setProperty(PropertyEntity property) {
        this.property = property;
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

    public int getPriority() {
        return priority;
    }

    public void setPriority(int priority) {
        this.priority = priority;
    }
}
