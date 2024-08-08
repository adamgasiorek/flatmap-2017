package com.yeahbunny.ws.util;

import com.yeahbunny.dao.CurrencyRepository;
import com.yeahbunny.domain.CurrencyEntity;
import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.PriceEntity;
import com.yeahbunny.domain.type.CurrencyType;
import com.yeahbunny.exception.BadFilterArgumentException;
import com.yeahbunny.ws.dto.LastAddedType;
import com.yeahbunny.ws.dto.MapMarker;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Component;

import javax.inject.Inject;
import java.time.ZonedDateTime;
import java.time.temporal.ChronoUnit;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

@Component
public class MarkerFilter {

    @Inject
    private CurrencyRepository currencyRepository;

    private static final Logger LOG = LoggerFactory.getLogger(MarkerFilter.class);

    public List<OfferEntity> removeOfferIfInBoundary(List<OfferEntity> bigRectangle, AreaBoundary areaBoundary) {
        return bigRectangle.stream().filter((mapMarker) -> {
            if(mapMarker.getFakeLatitude()>= areaBoundary.getMin().getFakeLatitude() &&
                    mapMarker.getFakeLatitude()<= areaBoundary.getMax().getFakeLatitude() &&
                    mapMarker.getFakeLongitude()>= areaBoundary.getMin().getFakeLongitude() &&
                    mapMarker.getFakeLongitude()<= areaBoundary.getMax().getFakeLongitude()){
                return false;
            }else{
                return true;
            }
        }).collect(Collectors.toList());
    }

    public List<MapMarker> filterOffers(List<OfferEntity> offersInBoundary, Map<String, String> params) {
        return offersInBoundary
                .stream()
                .filter((offer)-> filterByParams(offer,params))
                .map((offer)->{
                    return MapMarker.generate(offer);
                })
                .collect(Collectors.toList());
    }

    private boolean filterByParams(OfferEntity offerEntity, Map<String, String> params) {
        //bedzie ekstra przy optymalizacji 8)
        for(Map.Entry<String, String> entry : params.entrySet()){
            switch (entry.getKey().toLowerCase()){
                case "offertype":{
                    if(!matchMultiValues(offerEntity.getOfferType().ordinal(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "propertytype":{
                    if(!matchMultiValues(offerEntity.getProperty().getPropertyType().getValue(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "price":{
                    if(!matchPrice(offerEntity.getPrice(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "isfromagency":{
                    if(!matchBoolean(offerEntity.getPerson().getIsAgency(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "lastadded":{
                    if(!isLastAdded(offerEntity, entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "buildingtype":{
                    if(!matchMultiValues(offerEntity.getProperty().getBuildingType().getValue(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "personcount":{
                    if(!matchMultiValues(offerEntity.getProperty().getMaxPerson(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "heatingtype":{
                    if(!matchMultiValues(offerEntity.getProperty().getHeatingType().ordinal(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "area":{
                    if(!matchRange(offerEntity.getProperty().getArea(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "roomcount":{
                    if(!matchMultiValues(offerEntity.getProperty().getRoomCount(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "floor":{
                    if(!matchMultiValues(offerEntity.getProperty().getFloor(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "year":{
                    if(!matchRange(offerEntity.getProperty().getBuiltYear(), entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "furnished":{
                    if(!matchBoolean(offerEntity.getProperty().getFurnished(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "balcony":{
                    if(!matchBoolean(offerEntity.getProperty().getBalcony(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "lift":{
                    if(!matchBoolean(offerEntity.getProperty().getLift(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "basement":{
                    if(!matchBoolean(offerEntity.getProperty().getBasement(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "parking":{
                    if(!matchBoolean(offerEntity.getProperty().getParkingPlace(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "pets":{
                    if(!matchBoolean(offerEntity.getProperty().getPets(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "garden":{
                    if(!matchBoolean(offerEntity.getProperty().getGarden(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "clima":{
                    if(!matchBoolean(offerEntity.getProperty().getClimatisation(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                case "smoking":{
                    if(!matchBoolean(offerEntity.getProperty().getSmoking(),entry)){
                        LOG.debug("Throw offer while filter {}", entry.getKey());
                        return false;
                    }
                    break;
                }
                default:{
                    LOG.error("filter {} doesnt exists", entry.getKey());
                    throw new BadFilterArgumentException(entry.getKey());
                }
            }
        }
        return true;
    }

    private boolean isLastAdded(OfferEntity offerEntity, Map.Entry<String, String> entry) {
    try{
        LastAddedType lastAddedType = LastAddedType.values()[Integer.parseInt(entry.getValue())];

        switch (lastAddedType){
            case DAY:{
                return !offerEntity.getAddDate().isBefore(ZonedDateTime.now().minus(1, ChronoUnit.DAYS));
            }
            case THREE_DAYS:{
                return !offerEntity.getAddDate().isBefore(ZonedDateTime.now().minus(3, ChronoUnit.DAYS));
            }
            case WEEK:{
                return !offerEntity.getAddDate().isBefore(ZonedDateTime.now().minus(7, ChronoUnit.DAYS));
            }
        }
    }catch(NumberFormatException e){
        throw new BadFilterArgumentException(entry.getKey(),entry.getValue(),Integer.class);
    }
        return true;
    }

    private boolean matchBoolean(Boolean dbValue, Map.Entry<String, String> entry) {
        if(dbValue == null){
            return true;
        }
        if(entry.getValue().charAt(0)=='f'){
            return dbValue == false;
        }else {
            return dbValue == true;
        }
    }

    private boolean matchRange(int area, Map.Entry<String, String> entry) {
        try{
            String[] values = entry.getValue().split("-");
            if(values.length >=1 && area< Integer.parseInt(values[0])){
                LOG.debug("Throw offer while filter {}", entry.getKey());
                return false;
            }

            if(values.length >=2 && area > Integer.parseInt(values[1])){
                LOG.debug("Throw offer while filter {}", entry.getKey());
                return false;
            }
        }catch(NumberFormatException e){
            throw new BadFilterArgumentException(entry.getKey(),entry.getValue(),Integer.class);
        }
        return true;

    }

    private double getCurrencyMultiplier(String currencyCode){

        if(currencyCode.equals(CurrencyType.ZL.name())){
            return 1;
        }

        CurrencyEntity entity = currencyRepository.findOne(currencyCode);
        if(entity == null){
            LOG.error("Cannot find currency multiplier with code {} in database", currencyCode);
            throw new BadFilterArgumentException("PRICE");

        }else{

            return entity.getValue();
        }
    }

    private boolean matchPrice(PriceEntity priceEntity, Map.Entry<String,String> entry) {
        try{
            String[] values = entry.getValue().split("-");
            if(values.length<3 || Integer.parseInt(values[2]) >= CurrencyType.values().length){
                throw new BadFilterArgumentException(entry.getKey());
            }

            for(int i = 0; i<2; i++){
                if(values[i].trim().equals("")){
                    values[i] = "0";
                }
            }

            CurrencyType currencyType = CurrencyType.values()[Integer.parseInt(values[2])];
            double paramsCurrencyMultiplier = getCurrencyMultiplier(currencyType.name());
            double targetCurrencyMultiplier = getCurrencyMultiplier(priceEntity.getCurrency().name());



            double minPrice = Integer.parseInt(values[0]) * paramsCurrencyMultiplier;
            double maxPrice = Integer.parseInt(values[1]) * paramsCurrencyMultiplier;
            double targetPrice  = priceEntity.getValue() * targetCurrencyMultiplier;

            LOG.debug("Price bounduary {} {} pln from {} target price {} pln from {}", minPrice,maxPrice,currencyType.name(), targetPrice, priceEntity.getCurrency().name());

            if((maxPrice>0 && targetPrice > maxPrice )|| targetPrice <minPrice){
                return false;
            }else {
                return true;
            }
        }catch(NumberFormatException e){
            throw new BadFilterArgumentException(entry.getKey(),entry.getValue(),Integer.class);
        }
    }

    private boolean matchMultiValues(int enumOrdinalValue, Map.Entry<String,String> entry) {
        try{
            String[] values = entry.getValue().split("-");
            for(int i = 0; i < values.length; i++){
                int paramValue = Integer.parseInt(values[i]);
                if(enumOrdinalValue == paramValue){
                   return true;
                };
            }
            return false;

        }catch(NumberFormatException e){
            throw new BadFilterArgumentException(entry.getKey(),entry.getValue(),Integer.class);
        }
    }



}
