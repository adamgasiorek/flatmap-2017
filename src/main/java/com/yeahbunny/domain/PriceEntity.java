package com.yeahbunny.domain;

import com.yeahbunny.domain.type.CurrencyType;
import com.yeahbunny.domain.type.PriceType;

import javax.persistence.*;

@Entity
@Table(name = "price")
public class PriceEntity extends AbstractEntity{

    @Column(name = "value")
    Integer value;

    @Column(name = "currency")
    @Enumerated(EnumType.STRING)
    CurrencyType currency;

    @Column(name = "type")
    @Enumerated(EnumType.ORDINAL)
    PriceType priceType;

    public Integer getValue() {
        return value;
    }

    public void setValue(Integer value) {
        this.value = value;
    }

    public CurrencyType getCurrency() {
        return currency;
    }

    public void setCurrency(CurrencyType currency) {
        this.currency = currency;
    }

    public PriceType getPriceType() {
        return priceType;
    }

    public void setPriceType(PriceType priceType) {
        this.priceType = priceType;
    }
}
