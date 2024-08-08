package com.yeahbunny.service;

import com.yeahbunny.domain.TemporaryPhotoEntity;
import org.apache.commons.io.IOUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.awt.image.ShortLookupTable;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.net.URL;
import java.nio.file.*;
import java.time.ZonedDateTime;

@Service
public class StorageService {

    private static final Logger LOG = LoggerFactory.getLogger(StorageService.class);

    @Value("${app.storage.mainpath}")
    private String mainPath;
    @Value("${app.storage.thumbpath}")
    private String thumbPath;
    @Value("${app.storage.directoryseparator}")
    private String directorySeparator;
    @Value("${app.storage.imageformat}")
    private String imageFormat;

    private static int tempId = 0;

    public String preparePath(Long userId, ZonedDateTime storeFileDateTime){

       StringBuilder sb = new StringBuilder();
        sb.append(prepareBasePath(userId,storeFileDateTime));
        sb.append(storeFileDateTime.toInstant().toEpochMilli());
        sb.append("-");
        sb.append(tempId++);
        sb.append(imageFormat);
        return sb.toString();
    }

    public String prepareThumbPath(Long userId, ZonedDateTime storeFileDateTime) {
        StringBuilder sb = new StringBuilder();
        sb.append(prepareBasePath(userId,storeFileDateTime));
        sb.append(thumbPath);
        sb.append(storeFileDateTime.toInstant().toEpochMilli());
        sb.append("-th-");
        sb.append(tempId++);
        sb.append(imageFormat);
        return sb.toString();
    }

    private String prepareBasePath(Long userId, ZonedDateTime storeFileDateTime){
        return  mainPath +
                String.valueOf(storeFileDateTime.getYear()) +
                directorySeparator +
                storeFileDateTime.getMonthValue() +
                directorySeparator +
                storeFileDateTime.getDayOfMonth() +
                directorySeparator +
                userId +
                directorySeparator;
    }

    public String store(String path, byte[] fileToStore) {

        File directory = new File(path.substring(0,path.lastIndexOf(directorySeparator)));
        if (! directory.exists()){
            boolean result = directory.mkdirs();
            LOG.debug("directories {} created: {}", path,result);
        }



        try(FileOutputStream stream = new FileOutputStream(path)) {
            stream.write(fileToStore);
        } catch (FileNotFoundException e){
            e.printStackTrace();
            return null;
        }catch (IOException e){
            e.printStackTrace();
            return null;
        }

         return path;
    }

    public byte[] load(String url) {
        Path path = Paths.get(url);
        try {
            return Files.readAllBytes(path);
        } catch (IOException e) {
            e.printStackTrace();
            return null;
        }
    }

    public boolean removeTemporaryPhoto(TemporaryPhotoEntity temporaryPhoto) {

        if(this.removeFile(temporaryPhoto.getUrl())){
            if(this.removeFile(temporaryPhoto.getThumbUrl())){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public boolean removeFile(String photoUrl) {
        try {
            Files.delete(Paths.get(photoUrl));
            return true;
        } catch (NoSuchFileException e) {
            //file does not exists so its like removed
            return true;
        } catch (DirectoryNotEmptyException e) {
            e.printStackTrace();
            return false;
        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    }
}
