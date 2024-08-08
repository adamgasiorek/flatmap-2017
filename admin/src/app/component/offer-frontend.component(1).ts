import {Component, OnInit, Input} from "@angular/core";
import {DomSanitizer} from "@angular/platform-browser";
import {ConfigService} from "../service/config.service";
@Component({
  selector: 'offer-frontend',
  templateUrl: '../view/offer-frontend.view.html',
  styleUrls: ['../style/offer-frontend.style.css']
})
export class OfferFrontendComponent implements OnInit{

  @Input()
  offerId:string;
  private frontEndOfferUrl;

  constructor(private sanitizer:DomSanitizer){}

  ngOnInit(){
    this.frontEndOfferUrl = this.sanitizer.bypassSecurityTrustResourceUrl(ConfigService.getFrontUrlToOffer(this.offerId));

  }
}
