package com.yeahbunny.ws.dto;

public class PhotoUploadRequest {
    private byte[] image;
    private boolean mainPhoto;

    public void setImage(byte[] image) {
        this.image = image;
    }

    public byte[] getImage() {
        return this.image;
    }

    public boolean isMainPhoto() {
        return mainPhoto;
    }

    public void setMainPhoto(boolean mainPhoto) {
        this.mainPhoto = mainPhoto;
    }
}
