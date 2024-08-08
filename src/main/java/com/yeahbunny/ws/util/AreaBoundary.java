package com.yeahbunny.ws.util;

import com.yeahbunny.exception.BadArgumentsException;

public class AreaBoundary {
    private MarkerPoint min;
    private MarkerPoint max;

    public AreaBoundary(MarkerPoint min, MarkerPoint max) {
        if(min.getFakeLatitude()>max.getFakeLatitude() || min.getFakeLongitude()>max.getFakeLongitude()){
            throw new BadArgumentsException("INVALID BOUNDARY");
        }
        this.min = min;
        this.max = max;
    }

    public MarkerPoint getMin() {
        return min;
    }

    public MarkerPoint getMax() {
        return max;
    }
}
