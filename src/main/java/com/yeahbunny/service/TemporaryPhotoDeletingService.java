package com.yeahbunny.service;

import com.yeahbunny.dao.TemporaryPhotoRepository;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;

import javax.inject.Inject;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;

@Service
public class TemporaryPhotoDeletingService {

    private final static Logger LOG = LoggerFactory.getLogger(TemporaryPhotoDeletingService.class);

    @Inject
    StorageService storageService;

    @Inject
    TemporaryPhotoRepository temporaryPhotoRepository;

    public void execute() {

        ZonedDateTime date = ZonedDateTime.now().minus(24, ChronoUnit.HOURS);
//add column add date
        temporaryPhotoRepository.findAllByStoreDateBefore(date).forEach((temporaryPhotoEntity -> {
            if(storageService.removeTemporaryPhoto(temporaryPhotoEntity)){
                LOG.info("Removing temp photo id {}", temporaryPhotoEntity.getId());
                temporaryPhotoRepository.delete(temporaryPhotoEntity);
            }else{
                LOG.error("Cannot delete temporary photo {}", temporaryPhotoEntity.getId());
            }
        }));
    }
}
