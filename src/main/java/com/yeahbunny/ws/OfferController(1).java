package com.yeahbunny.ws;

import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.dao.ReportedOfferRepository;
import com.yeahbunny.domain.OfferEntity;
import com.yeahbunny.domain.ReportedOfferEntity;
import com.yeahbunny.exception.BadArgumentsException;
import com.yeahbunny.ws.dto.ReportOfferRequest;
import com.yeahbunny.ws.dto.offer.OfferDto;

import com.yeahbunny.ws.util.DtoGenerator;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import javax.validation.Valid;

@RestController
@RequestMapping(value = "/offer")
public class OfferController {
    private static final Logger LOG = LoggerFactory.getLogger(OfferController.class);

    @Inject
    OfferRepository offerRepository;

    @Inject
    ReportedOfferRepository reportedOfferRepository;

    @RequestMapping(value = "/get", method = RequestMethod.GET)
    public @ResponseBody OfferDto getOffer(@RequestParam String id){
        OfferEntity entity = getByIdOrAlias(id);


        if(entity == null){
            throw new BadArgumentsException("Offer does not exists");
        }
        entity.addView();
        offerRepository.save(entity);//wielowątkowosc to zniszczy chyba
        OfferDto result = new DtoGenerator<OfferDto>().generate(OfferDto.class,entity);
        return result;
    }

    private OfferEntity getByIdOrAlias(String idOrAlias) {
        if(idOrAlias.matches("[0-9]*")){
            return offerRepository.findOne(new Long(idOrAlias));
        }else{
            return offerRepository.findByAlias(idOrAlias);
        }
    }

    @RequestMapping(value = "/report", method = RequestMethod.POST)
    public @ResponseBody ResponseEntity<String> reportOffer(@RequestBody @Valid ReportOfferRequest reportOfferRequest){
        LOG.info("Reporting offer {} cause {}",reportOfferRequest.getOfferId(), reportOfferRequest.getCause());

        OfferEntity offerEntity = getByIdOrAlias(reportOfferRequest.getOfferId());

        if(offerEntity == null){
            LOG.info("Offer {} does not exists",reportOfferRequest.getOfferId());
            return ResponseEntity.status(400).body("OFFER_DOESNT_EXISTS");
        }

        ReportedOfferEntity reportedOfferEntity = new ReportedOfferEntity();
        reportedOfferEntity.setCause(reportOfferRequest.getCause());
        reportedOfferEntity.setOffer(offerEntity);

        reportedOfferRepository.save(reportedOfferEntity);

        return ResponseEntity.ok("OK");
    }

    @ExceptionHandler(RuntimeException.class)
    public ResponseEntity<String> handleEmployeeNotFoundException(Exception ex){
        return ResponseEntity.status(400).body(ex.getMessage());
    }

}
