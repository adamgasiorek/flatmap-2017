package com.yeahbunny.ws.util;

import com.yeahbunny.domain.AbstractEntity;
import com.yeahbunny.domain.PersonEntity;

/**
 * Created by kroli on 27.01.2017.
 */
public interface PrincipalProvider {
    AbstractEntity getEntity();
}
