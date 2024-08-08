package com.yeahbunny.ws;

import com.yeahbunny.dao.PhotoRepository;
import com.yeahbunny.domain.PhotoEntity;
import com.yeahbunny.exception.StorageFileNotFoundException;
import com.yeahbunny.service.StorageService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import javax.servlet.http.HttpServletResponse;

@Controller
@RequestMapping(value = "/photo")
public class PhotoController {

    private static final Logger LOG = LoggerFactory.getLogger(PhotoController.class);

    @Inject
    private StorageService storageService;

    @Inject
    private PhotoRepository photoRepository;

    @RequestMapping(value = "/{imageId}", method = RequestMethod.GET, produces = MediaType.IMAGE_JPEG_VALUE)
    @ResponseBody
    public byte[] getImage(@PathVariable long imageId, HttpServletResponse response)  {

        PhotoEntity photoEntity = this.photoRepository.findOne(imageId);

        if(photoEntity ==null){
            response.setStatus(404);
            return null;
        }
        return this.storageService.load(photoEntity.getUrl());
    }

    @RequestMapping(value = "/thumb/{imageId}", method = RequestMethod.GET, produces = MediaType.IMAGE_JPEG_VALUE)
    @ResponseBody
    public byte[] getThumbImage(@PathVariable long imageId, HttpServletResponse response)  {

        PhotoEntity photoEntity = this.photoRepository.findOne(imageId);

        if(photoEntity ==null){
            response.setStatus(404);
            return null;
        }
        return this.storageService.load(photoEntity.getThumbUrl());
    }

    @ExceptionHandler(StorageFileNotFoundException.class)
    public ResponseEntity handleStorageFileNotFound(StorageFileNotFoundException exc) {
        return ResponseEntity.status(HttpStatus.NOT_FOUND).body("");
    }

}
