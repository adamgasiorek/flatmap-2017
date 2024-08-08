package com.yeahbunny.service;

import org.imgscalr.Scalr;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import javax.imageio.IIOImage;
import javax.imageio.ImageIO;
import javax.imageio.ImageWriteParam;
import javax.imageio.ImageWriter;
import javax.imageio.stream.ImageOutputStream;
import java.awt.image.BufferedImage;
import java.awt.image.BufferedImageOp;
import java.awt.image.DataBufferByte;
import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.Iterator;

@Service
public class PhotoConverterService {

    @Value("${app.photo.thumb-width}")
    private int thumbWidth;

    @Value("${app.photo.thumb-height}")
    private int thumbHeight;

    @Value("${app.photo.max-width}")
    private int maxPhotoWidth;

    @Value("${app.photo.max-height}")
    private int maxPhotoHeight;

    @Value("${app.photo.ratio-width}")
    private int ratioPhotoWidth;

    @Value("${app.photo.ratio-height}")
    private int ratioPhotoHeight;

    public byte[] createThumb(MultipartFile file) throws IOException{

            InputStream in = new ByteArrayInputStream(file.getBytes());
            BufferedImage bufferedImage = ImageIO.read(in);
            BufferedImage bufferedThumb = Scalr.resize(bufferedImage,thumbWidth,thumbHeight);
            ByteArrayOutputStream baos = new ByteArrayOutputStream();
            ImageIO.write(bufferedThumb, "jpg", baos );
            baos.flush();
            byte[] thumb = baos.toByteArray();
            baos.close();
            return thumb;


    }

    public byte[] compress1(byte[] photo,float q) throws IOException{

        InputStream in = new ByteArrayInputStream(photo);
        BufferedImage bufferedImage = ImageIO.read(in);

        return compress1(bufferedImage,q);
    }

    public byte[] compress1(BufferedImage bufferedImage, float quality) throws IOException{

            ByteArrayOutputStream compressedBaos = new ByteArrayOutputStream();
            ImageOutputStream outputStream = ImageIO.createImageOutputStream(compressedBaos);

            Iterator<ImageWriter> iter = ImageIO.getImageWritersByFormatName("jpg");

            if(!iter.hasNext()){
                return null;
            }

            ImageWriter writer =  iter.next();

            writer.setOutput(outputStream);

            ImageWriteParam imageWriteParams = writer.getDefaultWriteParam();
            imageWriteParams.setCompressionMode(ImageWriteParam.MODE_EXPLICIT);
            imageWriteParams.setCompressionQuality(quality);

            writer.write(null,new IIOImage(bufferedImage,null,null),imageWriteParams);

            writer.dispose();

        return compressedBaos.toByteArray();
    }

    public BufferedImage resizePhoto(byte[] photo) throws IOException{

        InputStream in = new ByteArrayInputStream(photo);
        BufferedImage bufferedImage = ImageIO.read(in);

        return resizePhoto(bufferedImage);
    }

    public BufferedImage resizePhoto(BufferedImage bufferedImage) throws IOException{

        int photoHeight = bufferedImage.getHeight();
        int photoWidth = bufferedImage.getWidth();

        if(photoWidth>maxPhotoWidth){
            photoWidth = maxPhotoWidth;
            photoHeight = photoWidth * ratioPhotoHeight / ratioPhotoWidth;
        }

        if(photoHeight>maxPhotoHeight){
            photoHeight = maxPhotoHeight;
            photoWidth = photoHeight * ratioPhotoWidth / ratioPhotoHeight;
        }

        BufferedImage resizedPhoto = Scalr.resize(bufferedImage,photoWidth,photoHeight);


        return resizedPhoto;

    }
}
