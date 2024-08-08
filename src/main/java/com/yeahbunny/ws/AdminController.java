package com.yeahbunny.ws;

import com.yeahbunny.dao.OfferRepository;
import com.yeahbunny.dao.PersonRepository;
import com.yeahbunny.dao.ReportedOfferRepository;
import com.yeahbunny.domain.*;
import com.yeahbunny.service.OfferActivatorService;
import com.yeahbunny.service.ReportExecutorService;
import com.yeahbunny.ws.dto.*;
import com.yeahbunny.ws.dto.offer.OfferDto;
import com.yeahbunny.ws.dto.offer.ReportDto;
import com.yeahbunny.ws.util.AdminPrincipalProvider;
import com.yeahbunny.ws.util.DtoGenerator;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.*;

import javax.inject.Inject;
import javax.validation.Valid;
import java.time.ZonedDateTime;
import java.util.Collections;
import java.util.List;
import java.util.stream.Collectors;

@RestController
@RequestMapping(value = "/admin")
public class AdminController {

    private static final Logger LOG = LoggerFactory.getLogger(AdminController.class);

    @Inject
    private AdminPrincipalProvider adminPrincipalProvider;

    @Inject
    private OfferActivatorService offerActivatorService;

    @Inject
    private ReportExecutorService reportExecutorService;

    @Inject
    private OfferRepository offerRepository;

    @Inject
    private PersonRepository personRepository;

    @Inject
    private ReportedOfferRepository reportedOfferRepository;

    @RequestMapping(value = "/getUsers", method = RequestMethod.GET)
    @ResponseBody
    private List<MyUserDto> getUsers(@RequestParam String name){

        LOG.debug("Search user by email: {}", name );

        if(name == null || name.length()<3){
            return Collections.emptyList();
        }

        List<PersonEntity> personEntityList = personRepository.findByEmailContaining(name);

        DtoGenerator<MyUserDto> dtoDtoGenerator = new DtoGenerator<MyUserDto>();

        return personEntityList.stream().map(item->{
            LOG.info("Found user {}", item.getEmail());
            return dtoDtoGenerator.generate(MyUserDto.class,item);
        }).collect(Collectors.toList());
    }

    @RequestMapping(value = "/getUser", method = RequestMethod.GET)
    @ResponseBody
    private MyUserDto getUser(@RequestParam Long id){

        LOG.debug("Search user by id: {}", id );

        PersonEntity personEntity = personRepository.findOne(id);

        DtoGenerator<MyUserDto> dtoDtoGenerator = new DtoGenerator<MyUserDto>();

        if(personEntity == null){
            return null;
        }else{
            return dtoDtoGenerator.generate(MyUserDto.class,personEntity);
        }
    }

    @Transactional
    @RequestMapping(value = "/addPoints", method = RequestMethod.POST)
    @ResponseBody
    private ResponseEntity<String> addPoints(@RequestBody @Valid AddPointsRequest addPointsRequest){
        LOG.debug("Adding points");
        AdminEntity adminEntity = this.adminPrincipalProvider.getEntity();

        PersonEntity personEntity = this.personRepository.findOne(addPointsRequest.getUserId());
        personEntity.addPoints(addPointsRequest.getPointsCount());
        personRepository.save(personEntity);
/*        PersonHistoryEntity personHistoryEntity = new PersonHistoryEntity();
        personHistoryEntity.setUser(personEntity);
        personHistoryEntity.setType(HistoryType.ADD);
        personHistoryEntity.setDesc(addPointsRequest.getReason());
        personHistoryEntity.setPointsCount(addPointsRequest.getPointsCount());
        personHistoryEntity.setAdmin(adminEntity);
        personHistoryRepository.add(personHistoryEntity);*/

        LOG.info("Added {} points to user {} by {}",addPointsRequest.getPointsCount(),personEntity.getEmail(),adminEntity.getEmail());

        //this.notifyUserService.notifyAddedPoints(adminEntity,personEntity,addPointsRequest);

        return ResponseEntity.ok("OK");

    }

    @Transactional
    @RequestMapping(value = "/acceptOffer", method = RequestMethod.POST)
    @ResponseBody
    private ResponseEntity<String> acceptOffer(@RequestBody @Valid AcceptOfferRequest acceptOfferRequest){
        OfferEntity offerEntity = this.offerRepository.findOne(acceptOfferRequest.getOfferId());
        if(offerEntity == null){
            return ResponseEntity.status(404).body("OFFER_DOESNT_EXISTS");
        }

        if(offerEntity.isConsumedByAdmin() == true){
            return ResponseEntity.status(410).body("ALREADY_CONSUMED");
        }

        LOG.info("Offer {} accepting", offerEntity.getId());
        AdminEntity adminEntity = this.adminPrincipalProvider.getEntity();

        OfferAcceptingHistoryEntity acceptingHistoryEntity = new OfferAcceptingHistoryEntity();
        acceptingHistoryEntity.setAdmin(adminEntity);
        acceptingHistoryEntity.setReason(null);

        this.offerActivatorService.acceptOffer(offerEntity,acceptingHistoryEntity);

        return ResponseEntity.ok("OK");
    }

    @RequestMapping(value = "/rejectOffer", method = RequestMethod.POST)
    @ResponseBody
    private ResponseEntity<String> rejectOffer(@RequestBody @Valid RejectOfferRequest rejectOfferRequest){
        OfferEntity offerEntity = this.offerRepository.findOne(rejectOfferRequest.getOfferId());
        if(offerEntity == null){
            return ResponseEntity.status(404).body("OFFER_DOESNT_EXISTS");
        }

        if(offerEntity.isConsumedByAdmin() == true){
            return ResponseEntity.status(410).body("ALREADY_CONSUMED");
        }

        LOG.info("Offer {} rejecting", offerEntity.getId());
        AdminEntity adminEntity = this.adminPrincipalProvider.getEntity();

        OfferAcceptingHistoryEntity acceptingHistoryEntity = new OfferAcceptingHistoryEntity();
        acceptingHistoryEntity.setAdmin(adminEntity);
        acceptingHistoryEntity.setReason(rejectOfferRequest.getReason());
        offerActivatorService.deactivateByRejectOffer(offerEntity,acceptingHistoryEntity);
        return ResponseEntity.ok("OK");

    }

    @RequestMapping(value = "/getNotAcceptedOffers", method = RequestMethod.GET)
    @ResponseBody
    private List<OfferDto> getNotAcceptedOffers(){
        List<OfferEntity> offerEntityList = offerRepository.findAllByConsumedByAdminFalseAndActiveTrue();
        DtoGenerator<OfferDto> generator = new DtoGenerator<OfferDto>();

        return offerEntityList.stream().map(item->{
            return  generator.generate(OfferDto.class,item);
        }).collect(Collectors.toList());


    }

    @RequestMapping(value = "/getReports", method = RequestMethod.GET)
    @ResponseBody
    private List<ReportDto> getReports(){
        List<ReportedOfferEntity> reportList = this.reportedOfferRepository.findAllByConsumedFalseOrderByReportDate();

        DtoGenerator<ReportDto> generator = new DtoGenerator<ReportDto>();

        return  reportList.stream().map(reportedOfferEntity -> {
            return generator.generate(ReportDto.class,reportedOfferEntity);
        }).collect(Collectors.toList());
    }

    @RequestMapping(value = "/ignoreReport", method = RequestMethod.POST)
    @ResponseBody
    private ResponseEntity<String> ignoreReport(@RequestBody @Valid IgnoreReportRequest ignoreReportRequest){
        ReportedOfferEntity reportedOfferEntity = this.reportedOfferRepository.findOne(ignoreReportRequest.getReportId());
        if(reportedOfferEntity == null){
            return ResponseEntity.status(404).body("REPORT_DOESNT_EXISTS");
        }

        if(reportedOfferEntity.getConsumed() == true){
            return ResponseEntity.status(410).body("ALREADY_CONSUMED");
        }
        LOG.info("Report {} ignoring", reportedOfferEntity.getId());

        AdminEntity adminEntity = this.adminPrincipalProvider.getEntity();

        this.reportExecutorService.ignoreReport(reportedOfferEntity,adminEntity);

        return ResponseEntity.ok("OK");
    }

    @RequestMapping(value = "/banOfferByReport", method = RequestMethod.POST)
    @ResponseBody
    private ResponseEntity<String> banOfferByReportReport(@RequestBody @Valid BanOfferByReportRequest banRequest){
        ReportedOfferEntity reportedOfferEntity = this.reportedOfferRepository.findOne(banRequest.getReportId());
        if(reportedOfferEntity == null){
            return ResponseEntity.status(404).body("REPORT_DOESNT_EXISTS");
        }

        if(reportedOfferEntity.getConsumed() == true){
            return ResponseEntity.status(410).body("ALREADY_CONSUMED");
        }

        LOG.info("Report {} executing cause: {}", reportedOfferEntity.getId(), banRequest.getBanReason());

        AdminEntity adminEntity = this.adminPrincipalProvider.getEntity();

        this.reportExecutorService.executeReport(reportedOfferEntity,adminEntity, banRequest.getBanReason());

        return ResponseEntity.ok("OK");
    }
}
