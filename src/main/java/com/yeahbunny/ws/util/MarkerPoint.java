package com.yeahbunny.ws.util;

import com.yeahbunny.exception.BadArgumentsException;

public class MarkerPoint {
    private double fakeLatitude;
    private double fakeLongitude;

    public MarkerPoint(double latitude, double longitude) {
        this.fakeLatitude = latitude+90;
        this.fakeLongitude = longitude+180;
        if(this.fakeLatitude>180 || this.fakeLongitude>360 || this.fakeLatitude<0 || this.fakeLongitude<0){
            throw new BadArgumentsException("ARGUMENTS OUT OF BOUNDS");
        }
    }

    public double getFakeLatitude() {
        return fakeLatitude;
    }

    public double getFakeLongitude() {
        return fakeLongitude;
    }
}
