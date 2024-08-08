package com.yeahbunny.domain.util;

import com.yeahbunny.domain.type.PropertyType;

import javax.persistence.AttributeConverter;


public class PropertyTypeJpaConverter implements AttributeConverter<PropertyType, Integer> {

    @Override
    public Integer convertToDatabaseColumn(PropertyType propertyType) {
        if(propertyType == null){
            return null;
        }else{
            return propertyType.getValue();
        }
    }

    @Override
    public PropertyType convertToEntityAttribute(Integer integer) {
        if(integer == null){
            return null;
        }else{
            return PropertyType.get(integer);
        }
    }
}
