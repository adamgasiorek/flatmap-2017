package com.yeahbunny.ws.dto.offer;

import com.yeahbunny.domain.type.CurrencyType;
import com.yeahbunny.domain.type.PriceType;

public class PriceDto {

    Integer value;
    CurrencyType currency;

    public Integer getValue() {
        return value;
    }

    public void setValue(Integer value) {
        this.value = value;
    }

    public int getCurrency() {
        return currency.ordinal();
    }

    public void setCurrency(CurrencyType currency) {
        this.currency = currency;
    }

}
