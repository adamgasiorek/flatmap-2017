package com.yeahbunny.ws.util;

import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.DeserializationContext;
import com.fasterxml.jackson.databind.JsonDeserializer;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.deser.std.UntypedObjectDeserializer;
import com.yeahbunny.domain.type.HeatingType;

import java.io.IOException;

/**
 * Created by kroli on 14.01.2017.
 */
public class HeatingTypeDeserializer extends JsonDeserializer<HeatingType> {

        @Override
        public HeatingType deserialize(JsonParser jsonParser, DeserializationContext context) throws IOException, JsonProcessingException {
                JsonNode node = jsonParser.readValueAsTree();
                if (node.asText().isEmpty()) {
                        return null;
                }else{
                        return HeatingType.values()[Integer.parseInt(node.textValue())];
                }

        }
}
