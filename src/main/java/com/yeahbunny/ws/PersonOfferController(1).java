package com.yeahbunny.ws;

import com.yeahbunny.dao.*;
import com.yeahbunny.domain.*;
import com.yeahbunny.exception.BadArgumentsException;
import com.yeahbunny.service.OfferExtenderService;
import com.yeahbunny.service.PhotoConverterService;
import com.yeahbunny.service.StorageService;
import com.yeahbunny.ws.dto.AddOfferRequest;
import com.yeahbunny.ws.dto.offer.OfferDto;
import com.yeahbunny.ws.util.DtoGenerator;
import com.yeahbunny.ws.util.PersonPrincipalProvider;
import org.imgscalr.Scalr;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import javax.imageio.ImageIO;
import javax.inject.Inject;
import javax.validation.Valid;
import java.awt.image.BufferedImage;
import java.io.*;
import java.time.ZonedDateTime;
import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping(value = "/person/offer")
public class PersonOfferController {

    private static final Logger LOG = LoggerFactory.getLogger(PersonOfferController.class);



    @Inject
    PersonPrincipalProvider personPrincipalProvider;

    @Inject
    OfferRepository offerRepository;

    @Inject
    ContactRepository contactRepository;

    @Inject
    PersonRepository personRepository;

    @Inject
    StorageService storageService;

    @Inject
    OfferExtenderService offerExtenderService;

    @Inject
    PhotoConverterService photoConverterService;

    @Inject
    private PhotoRepository photoRepository;

    @Value("${app.offer.price}")
    private int offerPrice;

    private static float quality =0.5f;

    @Inject
    private TemporaryPhotoRepository temporaryPhotoRepository;

    @RequestMapping(value = "/getMyOffers", method = RequestMethod.GET)
    @ResponseBody
    public List<OfferDto> getOffer(){

       Long personId = this.personPrincipalProvider.getEntity().getId();

       List<OfferEntity> offerEntityList = this.offerRepository.findAllByPersonId(personId);

        List<OfferDto> result = new ArrayList<>();

        offerEntityList.forEach((offerEntity -> {
            result.add(new DtoGenerator<OfferDto>().generate(OfferDto.class,offerEntity));
        }));
        return result;
    }

    @Transactional
    @RequestMapping(value = "/add", method = RequestMethod.POST)
    @ResponseBody
    public ResponseEntity<String> addOffer(@RequestBody @Valid AddOfferRequest addOfferRequest){
        LOG.debug("Adding new offer");

        PersonEntity pe = personPrincipalProvider.getEntity();
        if(pe.getPoints()<= offerPrice){
            LOG.info("User points: {} price {}", pe.getPoints(), offerPrice);
            return ResponseEntity.status(400).body("CANT_AFFORD");
        }

        if(!personPrincipalProvider.getEntity().isActivated()){
            return ResponseEntity.status(400).body("MAIL_NOT_ACTIVATED");
        }

        ContactEntity contactEntity = generateContactEntity(addOfferRequest);
        OfferEntity offerEntity = addOfferRequest.generateEntity(personPrincipalProvider.getEntity(),contactEntity);
        offerRepository.save(offerEntity);
        generateAndSavePhotosList(addOfferRequest.getTemporaryPhotosId(),offerEntity.getProperty());

        personRepository.findOne(personPrincipalProvider.getEntity().getId()).addPoints(-offerPrice);
        return ResponseEntity.ok(offerEntity.getId().toString());
    }

    private List<PhotoEntity> generateAndSavePhotosList(Integer[] temporaryPhotosId, PropertyEntity propertyEntity)  {
        Long userId = personPrincipalProvider.getEntity().getId();
        List<PhotoEntity> result = new ArrayList<>();

        for(int i = 0; i<temporaryPhotosId.length; i++){
            TemporaryPhotoEntity temp = temporaryPhotoRepository.getOne(temporaryPhotosId[i].longValue());
            if(temp == null || !temp.getPerson().getId().equals(userId)){
                throw new SecurityException("Temp photo is not own by this user");
            }
            PhotoEntity photoEntity = generatePhotoEntity(temp,i,propertyEntity);

            photoRepository.save(photoEntity);
            temporaryPhotoRepository.delete(temp);
            result.add(photoEntity);
        }

        temporaryPhotoRepository.findAllByPersonId(userId).forEach((temporaryPhoto)->{
            if(storageService.removeTemporaryPhoto(temporaryPhoto)){
                temporaryPhotoRepository.delete(temporaryPhoto);
            }else {
                LOG.error("Cannot delete photo id {}", temporaryPhoto.getId());
            }

        });

        return result;
    }

    private PhotoEntity generatePhotoEntity(TemporaryPhotoEntity temp, int i, PropertyEntity propertyEntity) {
        PhotoEntity photoEntity = new PhotoEntity();
        photoEntity.setPriority(i);
        photoEntity.setUrl(temp.getUrl());
        photoEntity.setThumbUrl(temp.getThumbUrl());
        photoEntity.setStoreDate(ZonedDateTime.now());
        photoEntity.setProperty(propertyEntity);
        return photoEntity;
    }

    private ContactEntity generateContactEntity(AddOfferRequest addOfferRequest) {
        if(!addOfferRequest.isMainContact()){

            String contactName = addOfferRequest.getContactName();
            String contactEmail = addOfferRequest.getContactEmail();
            String phone = addOfferRequest.getContactPhoneNumber();

            if(contactName == null || contactName.trim().isEmpty()
                    || contactEmail == null || contactEmail.trim().isEmpty()){
                throw new BadArgumentsException("If isMainContact == false contactName and contactEmail cannot be null and empty");
            }

            ContactEntity contactEntity = new ContactEntity();
            contactEntity.setName(addOfferRequest.getContactName());
            contactEntity.setEmail(addOfferRequest.getContactEmail());
            contactEntity.setPhoneNumber(addOfferRequest.getContactPhoneNumber());
            return contactEntity;
        }else{
            return personPrincipalProvider.getEntity().getContact();
        }
    }

    @Transactional
    @RequestMapping(value = "/photo/upload", consumes = "multipart/form-data")
    public ResponseEntity<String> handleFileUpload(@RequestParam("files[]") MultipartFile file) throws IOException {
        ZonedDateTime storeFileDateTime = ZonedDateTime.now();

        String photoPath = storageService.preparePath(personPrincipalProvider.getEntity().getId(),storeFileDateTime);
        String thumbPath = storageService.prepareThumbPath(personPrincipalProvider.getEntity().getId(),storeFileDateTime);

        LOG.info("Saving photo {} and thumb {}", photoPath, thumbPath);

        BufferedImage resizedPhoto = this.photoConverterService.resizePhoto(file.getBytes());
        byte[] compressedPhoto = this.photoConverterService.compress1(resizedPhoto,quality);
        String photoUrl = this.storageService.store(photoPath, compressedPhoto);
        if(photoUrl == null){
            LOG.error("Save file failed, file {} ", photoPath);
            return ResponseEntity.status(400).body("SOMETHING_WRONG");
        }

        byte[] thumb = this.photoConverterService.createThumb(file);
        if(thumb.length==0){
            if(this.storageService.removeFile(photoUrl)){
                LOG.info("Creating thumb photo {} failed, file {} removed successfully",photoUrl, photoUrl);
            }else{
                LOG.error("Creating thumb photo {} failed, file {} removed unsuccessfully",photoUrl, photoUrl);
            }
            return ResponseEntity.status(400).body("THUMB_CREATE_FAILED");
        }

        String thumbUrl = this.storageService.store(thumbPath, thumb);
        if(thumbUrl == null){
            if(this.storageService.removeFile(photoUrl)){
                LOG.info("Save file {} failed, file {} removed successfully", thumbPath, photoUrl);
            }else{
                LOG.error("Save file {} failed, file {} removed unsuccessfully", thumbPath, photoUrl);
            }
            return ResponseEntity.status(400).body("SOMETHING_WRONG");
        }

        TemporaryPhotoEntity photoEntity = new TemporaryPhotoEntity();
        photoEntity.setUrl(photoPath);
        photoEntity.setThumbUrl(thumbPath);
        photoEntity.setPerson(personPrincipalProvider.getEntity());
        photoEntity.setStoreDate(storeFileDateTime);
        this.temporaryPhotoRepository.save(photoEntity);

        LOG.debug("Saved, temporary photos id {} ", photoEntity.getId().toString());
        return ResponseEntity.status(HttpStatus.OK).body(photoEntity.getId().toString());
    }
}
