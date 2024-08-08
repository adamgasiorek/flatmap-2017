package com.yeahbunny.ws.util;

import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.DeserializationContext;
import com.fasterxml.jackson.databind.JsonDeserializer;
import com.fasterxml.jackson.databind.JsonNode;
import com.yeahbunny.domain.type.BuildingType;
import com.yeahbunny.domain.type.PropertyType;

import java.io.IOException;

/**
 * Created by kroli on 15.01.2017.
 */
public class BuildingTypeDeserializer  extends JsonDeserializer<BuildingType> {

    @Override
    public BuildingType deserialize(JsonParser jsonParser, DeserializationContext deserializationContext) throws IOException, JsonProcessingException {
        JsonNode node = jsonParser.readValueAsTree();
        if (node.asText().isEmpty()) {
            return null;
        }else{
            return BuildingType.get(Integer.parseInt(node.textValue()));
        }
    }
}