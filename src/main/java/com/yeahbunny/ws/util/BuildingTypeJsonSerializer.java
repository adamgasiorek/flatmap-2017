package com.yeahbunny.ws.util;

import com.fasterxml.jackson.core.JsonGenerator;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.JsonSerializer;
import com.fasterxml.jackson.databind.SerializerProvider;
import com.yeahbunny.domain.type.BuildingType;

import java.io.IOException;

/**
 * Created by kroli on 15.01.2017.
 */
public class BuildingTypeJsonSerializer extends JsonSerializer<BuildingType> {

    @Override
    public void serialize(BuildingType buildingType, JsonGenerator jsonGenerator, SerializerProvider serializerProvider) throws IOException, JsonProcessingException {
        if(buildingType==null){
            jsonGenerator.writeString("");
        }else{
            jsonGenerator.writeNumber(buildingType.getValue());
        }
    }
}
