package com.yeahbunny.service;

import com.yeahbunny.dao.OfferHistoryRepository;
import com.yeahbunny.domain.OfferEntity;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.inject.Inject;

@Service
public class OfferExtenderService {

    @Inject
    NotifyUserService notifyUserService;

    @Inject
    OfferHistoryRepository offerHistoryRepository;

    @Value("${app.offer.price}")
    private int offerPrice;

    public boolean affordExtended(OfferEntity offerEntity) {
        return offerEntity.getPerson().getPoints()>0;
    }

    private void extend(OfferEntity offerEntity) {
       /* offerEntity.getPerson().addPoints(-offerPrice);
        offerEntity.setOfferActualToDate(ZonedDateTime.now().plus(30, ChronoUnit.DAYS));
        offerEntity.setActive(true);
        if(isAutoExtended){
            notifyUserService.notifyOfferAutoExtended(offerEntity);
        }else{
            notifyUserService.notifyOfferExtended(offerEntity);
        }

        OfferHistoryEntity historyEntity = new OfferHistoryEntity();

        historyEntity.setOffer(offerEntity);
        historyEntity.setDeactivated(false);
        historyEntity.set*/

    }
}
