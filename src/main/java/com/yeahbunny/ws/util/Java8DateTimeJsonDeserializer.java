package com.yeahbunny.ws.util;

import com.fasterxml.jackson.core.JsonGenerator;
import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.DeserializationContext;
import com.fasterxml.jackson.databind.JsonDeserializer;
import com.fasterxml.jackson.databind.JsonSerializer;
import com.fasterxml.jackson.databind.SerializerProvider;

import java.io.IOException;
import java.sql.Timestamp;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.util.Date;
import java.util.GregorianCalendar;

public class Java8DateTimeJsonDeserializer extends JsonDeserializer<ZonedDateTime> {

    @Override
    public ZonedDateTime deserialize(JsonParser jsonParser, DeserializationContext deserializationContext) throws IOException, JsonProcessingException {
        String timestamp = jsonParser.getText().trim();

        try {
            Timestamp stamp = new Timestamp(Long.parseLong(timestamp));
            Date date = new Date(stamp.getTime());
            return ZonedDateTime.ofInstant(date.toInstant(), ZoneId.systemDefault());
        } catch (NumberFormatException e) {
            e.printStackTrace();
            return null;
        }
    }
}
