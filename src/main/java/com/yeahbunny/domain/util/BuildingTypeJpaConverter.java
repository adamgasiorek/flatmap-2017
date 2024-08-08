package com.yeahbunny.domain.util;

import com.yeahbunny.domain.type.BuildingType;
import com.yeahbunny.domain.type.PropertyType;

import javax.persistence.AttributeConverter;

/**
 * Created by kroli on 15.01.2017.
 */
public class BuildingTypeJpaConverter implements AttributeConverter<BuildingType, Integer> {
    @Override
    public Integer convertToDatabaseColumn(BuildingType buildingType) {
        if( buildingType == null){
            return null;
        }else{
            return buildingType.getValue();
        }
    }

    @Override
    public BuildingType convertToEntityAttribute(Integer integer) {
        if(integer == null){
            return null;
        }else{
            return BuildingType.get(integer);
        }
    }
}
