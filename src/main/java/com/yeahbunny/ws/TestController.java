package com.yeahbunny.ws;

import com.yeahbunny.dao.ContactRepository;
import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.dao.PersonRepository;
import com.yeahbunny.dao.PhotoRepository;
import com.yeahbunny.domain.*;
import com.yeahbunny.domain.type.*;
import com.yeahbunny.service.OfferActualUpdaterService;
import com.yeahbunny.service.TemporaryPhotoDeletingService;
import com.yeahbunny.service.TokenCheckingService;
import com.yeahbunny.ws.util.PersonPrincipalProvider;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;
import java.util.Random;

@RestController
@RequestMapping(value = "/test")
public class TestController {

    private static final Logger LOG = LoggerFactory.getLogger(TestController.class);

    @Inject
    OfferRepository offerRepository;

    @Inject
    PhotoRepository photoRepository;

    @Inject
    PersonRepository personRepository;

    @Inject
    ContactRepository contactRepository;

    @Inject
    private PersonPrincipalProvider personPrincipalProvider;

    @Inject
    OfferActualUpdaterService offerActualUpdaterService;

    @Inject
    TokenCheckingService tokenCheckingService;

    @Inject
    TemporaryPhotoDeletingService temporaryPhotoDeletingService;

    @Transactional
    @RequestMapping(value= "/add", method = RequestMethod.GET)
    @ResponseBody
    public ResponseEntity<String> add(){
        generateOffers(52.249036 + 90 , 21.012810 +180);
        generateOffers(50.061718 + 90,19.937322+180);

      return ResponseEntity.ok().body("ODBJUR");
    }

    @Transactional
    @RequestMapping(value= "/show", method = RequestMethod.GET)
    @ResponseBody
    public ResponseEntity<String> show() {
      // temporaryPhotoDeletingService.execute();
        offerActualUpdaterService.execute();
        return ResponseEntity.ok().body("ODBJUR");

    }

    private void generateOffers(double baseLati, double baseLongi){
        for ( int i =0; i<500; i++){
            double latitude = baseLati + Math.pow(-1,new Random().nextInt(2)+1) * new Random().nextGaussian()/10;
            double longitude = baseLongi + Math.pow(-1,new Random().nextInt(2)+1) * new Random().nextGaussian()/10;

            OfferType offerType = OfferType.values()[i%OfferType.values().length];
            PropertyType propertyType = PropertyType.get((i%6)*50);
            BuildingType buildingType = BuildingType.get((i%6)*50 + i%2);
            this.offerRepository.save(createOfferEntity(latitude,longitude,offerType, propertyType,buildingType));
        }
    }

    private OfferEntity createOfferEntity(double latitude, double longitude, OfferType offerType, PropertyType propertyType, BuildingType buildingType){
        OfferEntity offerEntity = new OfferEntity();
        offerEntity.setFakeLatitude(latitude);
        offerEntity.setFakeLongitude(longitude);
        offerEntity.setOfferType(offerType);
        offerEntity.setOfferActualToDate(ZonedDateTime.now().plus(30, ChronoUnit.DAYS));
        offerEntity.setTitle("Tanie mieszkanie w centrum 2 pokoje");
        offerEntity.setDescription("Mieszkanie dla studentów, 3- 4 sooby, 2 pokoje centrum");
        offerEntity.setActive(true);

        PriceEntity priceEntity = new PriceEntity();
        priceEntity.setValue((new Random().nextInt(9)+3)*100);
        priceEntity.setCurrency(CurrencyType.ZL);
        priceEntity.setPriceType(PriceType.MONTH);
        offerEntity.setPrice(priceEntity);

        AddressEntity addressEntity = new AddressEntity();
        addressEntity.setCity("Krakow");
        addressEntity.setCountry("Polska");
        addressEntity.setFlatNumber("53/8");
        addressEntity.setStreet("Przy rondzie");

    PropertyEntity propertyEntity = new PropertyEntity();
        propertyEntity.setAddress(addressEntity);
        propertyEntity.setPropertyType(propertyType);
        propertyEntity.setBuildingType(buildingType);
        propertyEntity.setArea(new Random().nextInt(40) + 35);
        propertyEntity.setBalcony(Math.random() < 0.5);
        propertyEntity.setFloor(new Random().nextInt(5));
        propertyEntity.setLift(Math.random() < 0.5);
        propertyEntity.setFurnished(Math.random() < 0.5);
        propertyEntity.setPets(Math.random() < 0.5);

        propertyEntity.setRoomCount(new Random().nextInt(4)+1);
        int minPerson = new Random().nextInt(5);
        propertyEntity.setMinPerson(minPerson);
        propertyEntity.setMaxPerson(minPerson + 2);
        propertyEntity.setHeatingType(HeatingType.ELECTRIC);
        propertyEntity.setParkingPlace(Math.random() < 0.5);

        offerEntity.setProperty(propertyEntity);

    ContactEntity contactEntity = new ContactEntity();
        contactEntity.setName("Dominik Króliczek");
        contactEntity.setEmail("dominik@kroliczek.com");
        contactEntity.setPhoneNumber("+48665443221");


        contactRepository.save(contactEntity);
        offerEntity.setContact(contactEntity);

        offerEntity.setPerson(this.personRepository.findOne(new Long("1")));

        return offerEntity;
}


}
