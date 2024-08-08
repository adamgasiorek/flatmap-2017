package com.yeahbunny.domain.util;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import javax.persistence.AttributeConverter;
import java.time.Instant;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.util.Calendar;
import java.util.GregorianCalendar;

public class Java8DateTimeJpaConverter implements AttributeConverter<ZonedDateTime, Calendar> {
    private static final Logger LOG = LoggerFactory.getLogger(Java8DateTimeJpaConverter.class);

    @Override
    public Calendar convertToDatabaseColumn(ZonedDateTime zonedDateTime) {
        if (zonedDateTime == null) {
            return null;
        }

        return GregorianCalendar.from(zonedDateTime);
    }

    @Override
    public ZonedDateTime convertToEntityAttribute(Calendar calendar) {
        if (calendar == null) {
            return null;
        }
        Instant instant = Instant.ofEpochMilli(calendar.getTimeInMillis());
        return ZonedDateTime.ofInstant(instant, ZoneId.of("Z"));
    }
}
