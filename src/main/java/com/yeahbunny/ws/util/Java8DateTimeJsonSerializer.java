package com.yeahbunny.ws.util;

import com.fasterxml.jackson.core.JsonGenerator;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.JsonSerializer;
import com.fasterxml.jackson.databind.SerializerProvider;

import java.io.IOException;
import java.time.ZonedDateTime;
import java.util.GregorianCalendar;

public class Java8DateTimeJsonSerializer extends JsonSerializer<ZonedDateTime> {



    @Override
    public void serialize(ZonedDateTime zonedDateTime, JsonGenerator jsonGenerator, SerializerProvider serializerProvider) throws IOException, JsonProcessingException {
        if (zonedDateTime == null) {
            jsonGenerator.writeNumber(0);
            return;
        }

        GregorianCalendar date = GregorianCalendar.from(zonedDateTime);
        jsonGenerator.writeNumber(date.getTimeInMillis()/1000);
    }
}
