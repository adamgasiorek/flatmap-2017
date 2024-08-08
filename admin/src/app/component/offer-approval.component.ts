import {Component, OnInit, Sanitizer} from "@angular/core";
import {AdminService} from "../service/admin.service";
import {Offer} from "../model/offer.model";
import {LoginService} from "../service/login.service";

@Component({
  selector: 'offer-approval',
  templateUrl: '../view/offer-approval.view.html'
})
export class OfferApprovalComponent implements OnInit{
  private error:string;
  private offerList: Offer[];
  private selectedOffer:Offer;
  private modalError:string;
  private rejectReason:string;

  constructor(private adminService:AdminService, private loginService:LoginService){}

  ngOnInit():void {
    this.getOffers();
  }

  private getOffers(){
    this.adminService.getOffersToApproval().subscribe(
      (res:Offer[])=>{
        this.offerList = res;
        console.info(res);
        if(res.length == 0){
          this.error = "Brak ofert do zatwierdzenia";
        }
      },
      (err)=>{
        
        if(err.status == 403){
          this.loginService.on403();
        }else{
          this.error = "wystąpił błąd";
          console.info(err);
        }
      }
    )
  }

  onOfferSelected(item:Offer, offerModal){
    this.selectedOffer = item;
    offerModal.open();
    return false;
  }

  onOfferModalClose(){
    this.getOffers();
    this.selectedOffer = null;
    this.modalError = null;
  }

  onRejectOfferModalClose(){
    console.info("reject modal close");
    this.getOffers();
    this.selectedOffer = null;
    this.modalError = null;
    this.rejectReason = null;
  }

  acceptOffer(modal){
    this.adminService.acceptOffer(this.selectedOffer.id).subscribe(
      (res)=>{
        modal.close();
      },
      (err)=>{
        if(err.status == 403){
          this.loginService.on403();
        }else{
          this.modalError = err.text();
        }

      }
    )
  }

  goToRejectOffer(approvalModal, rejectModal){
    let temp = this.selectedOffer;
    approvalModal.close();
    this.selectedOffer = temp;
    rejectModal.open();

  }

  rejectOffer(modal){

    let reasonMinCount:number = 6;
    if(this.rejectReason == null || this.rejectReason.length <reasonMinCount){
      this.modalError = "podaj powód dłuższy niż " + reasonMinCount + " znaków";
      return;
    }
    this.adminService.rejectOffer(this.selectedOffer.id, this.rejectReason).subscribe(
      (res)=>{
        modal.close();
      },
      (err)=>{
        console.log(err);
        if(err.status == 403){
          this.loginService.on403();
        }else if(err.status == 410){
          this.modalError = "oferta została już rozpatrzona";
        }else{
          this.modalError = err.text();
        }

      }
    )
  }

}
