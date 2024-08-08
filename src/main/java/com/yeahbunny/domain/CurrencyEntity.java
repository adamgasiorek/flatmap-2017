package com.yeahbunny.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * Created by kroli on 31.12.2016.
 */
@Entity
@Table(name = "currency")
public class CurrencyEntity {

    @Id
    @Column(name = "currency_code")
    private String currencyCode;

    @Column(name = "currency_value")
    private double value;

    public CurrencyEntity() {
    }

    public CurrencyEntity(String currencyCode, double value) {
        this.currencyCode = currencyCode;
        this.value = value;
    }

    public void setCurrencyCode(String currencyCode) {
        this.currencyCode = currencyCode;
    }

    public void setValue(double value) {
        this.value = value;
    }

    public String getCurrencyCode() {
        return currencyCode;
    }

    public double getValue() {
        return value;
    }
}
