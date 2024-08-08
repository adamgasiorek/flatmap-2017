package com.yeahbunny.ws;

import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.domain.*;
import com.yeahbunny.exception.BadArgumentsException;
import com.yeahbunny.ws.dto.MapMarker;
import com.yeahbunny.ws.util.AreaBoundary;
import com.yeahbunny.ws.util.MarkerFilter;
import com.yeahbunny.ws.util.MarkerPoint;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.stream.Stream;

@RestController
@RequestMapping(value = "/marker")
public class MarkerController {
    private static final Logger LOG = LoggerFactory.getLogger(MarkerController.class);
private static int test;
    @Inject
    OfferRepository offerRepository;

    @Inject
    MarkerFilter markerFilter;

    @RequestMapping(value = "/get", method = RequestMethod.GET)
    private @ResponseBody List<MapMarker> getMarkers(@RequestParam Map<String,String> params){

        AreaBoundary areaBoundary = createAreaBoundary(params);
        List<OfferEntity> offersInBoundary = this.offerRepository.findAllByActiveTrueAndFakeLatitudeBetweenAndFakeLongitudeBetween(
                areaBoundary.getMin().getFakeLatitude(),
                areaBoundary.getMax().getFakeLatitude(),
                areaBoundary.getMin().getFakeLongitude(),
                areaBoundary.getMax().getFakeLongitude());

        List<MapMarker> result = markerFilter.filterOffers(offersInBoundary,params);
        test = result.size();
        LOG.info("Return {} markers", result.size());
        return result;
    }

    @RequestMapping(value = "/getNew", method = RequestMethod.GET)
    private @ResponseBody List<MapMarker> getNewMarkers(@RequestParam Map<String,String> params){
        List<AreaBoundary> areaBoundaries = createAreaBoundariesList(params);

       List<OfferEntity> bigRectangle = this.offerRepository.findAllByActiveTrueAndFakeLatitudeBetweenAndFakeLongitudeBetween(
                Math.min(areaBoundaries.get(0).getMin().getFakeLatitude(),areaBoundaries.get(1).getMin().getFakeLatitude()),
               Math.max(areaBoundaries.get(0).getMax().getFakeLatitude(),areaBoundaries.get(1).getMax().getFakeLatitude()),
               Math.min(areaBoundaries.get(0).getMin().getFakeLongitude(),areaBoundaries.get(1).getMin().getFakeLongitude()),
               Math.max(areaBoundaries.get(0).getMax().getFakeLongitude(),areaBoundaries.get(1).getMax().getFakeLongitude()));

        List<OfferEntity> onlyInterestedRegion = markerFilter.removeOfferIfInBoundary(bigRectangle, areaBoundaries.get(1));

        List<MapMarker> result = markerFilter.filterOffers(onlyInterestedRegion,params);

        test += result.size();
        LOG.info("Return {} markers All {}", result.size(), test);
            return result;

    }

    @RequestMapping(value = "/getById", method = RequestMethod.GET)
    private @ResponseBody MapMarker getMarkerById(@RequestParam String id){
        LOG.info("Get merker by offer id or alias {}", id);
        OfferEntity entity;
        if(id.matches("[0-9]*")){
            entity = offerRepository.findOne(new Long(id));
        }else{
            entity = offerRepository.findByAlias(id);
        }

        if(entity == null){
            throw new BadArgumentsException("Marker does not exists");
        }

        return MapMarker.generate(entity);

    }

    private AreaBoundary createAreaBoundary(Map<String, String> params) {
        try {
            return new AreaBoundary(
                    new MarkerPoint(Double.parseDouble(params.remove("x1")),Double.parseDouble(params.remove("y2"))),
                    new MarkerPoint(Double.parseDouble(params.remove("x2")),Double.parseDouble(params.remove("y1"))));
        }catch (NullPointerException e){
            throw new BadArgumentsException("NOT FOUND REQUIRED PARAMETERS");
        }catch (NumberFormatException e){
            throw new BadArgumentsException("CANNOT CONVERT REQUIRED PARAMETERS TO DOUBLE");
        }
    }

    private List<AreaBoundary> createAreaBoundariesList(Map<String, String> params) {
        List<AreaBoundary> result = new ArrayList<>();
        try{
            result.add(
                    new AreaBoundary(
                            new MarkerPoint(Double.parseDouble(params.remove("x1")),Double.parseDouble(params.remove("y2"))),
                            new MarkerPoint(Double.parseDouble(params.remove("x2")),Double.parseDouble(params.remove("y1")))));
            result.add(
                    new AreaBoundary(
                            new MarkerPoint(Double.parseDouble(params.remove("x3")),Double.parseDouble(params.remove("y4"))),
                            new MarkerPoint(Double.parseDouble(params.remove("x4")),Double.parseDouble(params.remove("y3")))));
            return result;
        }catch (NullPointerException e){
            throw new BadArgumentsException("NOT FOUND REQUIRED PARAMETERS");
        }catch (NumberFormatException e){
            throw new BadArgumentsException("CANNOT CONVERT REQUIRED PARAMETERS TO DOUBLE");
        }
    }

    @ExceptionHandler(RuntimeException.class)
    public ResponseEntity<String> handleEmployeeNotFoundException(Exception ex){
        ex.printStackTrace();
        return ResponseEntity.status(400).body(ex.getMessage());
    }



}
