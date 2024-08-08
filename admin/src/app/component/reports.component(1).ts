import {Component, OnInit} from "@angular/core";
import {AdminService} from "../service/admin.service";
import {LoginService} from "../service/login.service";
import {Report} from "../model/report.model";
@Component({
  selector: "reports",
  templateUrl: "../view/reports.view.html"
})
export class ReportsComponent implements OnInit{

  private modalError:string;
  private reportList:Report[];
  private selectedReport:Report;
  private banReason;
  private error;

  constructor(private adminService:AdminService, private loginService:LoginService){}

  ngOnInit(){
    this.getReports();
  }

  private getReports() {
    this.adminService.getReports().subscribe(
      (res)=>{
        this.reportList = res;
      },
      (err)=>{
        console.info(err);
        if(err.status == 403){
          this.loginService.on403();
        }else{
          this.error = "error";
        }
      }
    )
  }

  onReportSelected(item, reportModal){
    this.selectedReport = item;
    reportModal.open();
    return false;
  }

  onReportModalClose(){
    this.selectedReport = null;
    this.modalError = null;
    this.banReason = null;
  }

  private ignoreReport(offerModal){
    this.adminService.ignoreReport(this.selectedReport.id).subscribe(
      (res)=>{
        offerModal.close();
        this.getReports();
      },
      (err)=>{
        console.log(err);
        if(err.status == 403){
          this.loginService.on403();
        }else if(err.status == 410){
          this.getReports();
          this.modalError = "raport został już rozpatrzony, zamknij aby odświeżyć listę";
        }else{
          this.modalError = err.text();
        }
      }
    )
  }

  private goToBanOffer(reportModal, banOfferModal){
      let tempReport = this.selectedReport;
      let tempReason = this.banReason;
      reportModal.close();
      banOfferModal.open();
      this.banReason = tempReason;
      this.selectedReport = tempReport;
  }

  private onBanOfferModalClose(){
      this.selectedReport = null;
      this.modalError = null;
      this.banReason = null;
  }

  private backToReportModal(banOfferModal,reportModal){
    let tempReport = this.selectedReport;
    let tempReason = this.banReason;
    banOfferModal.close();
    reportModal.open();
    this.banReason = tempReason;
    this.selectedReport = tempReport;
  }

  private banOffer(banOfferModal){
    let reasonMinCount:number = 6;
    if(this.banReason == null || this.banReason.length <reasonMinCount){
      this.modalError = "podaj powód dłuższy niż " + reasonMinCount + " znaków";
      return;
    }
    
    this.adminService.banOfferByReport(this.selectedReport.id, this.banReason).subscribe(
      (res)=>{
        banOfferModal.close();
        this.getReports();
      },
      (err)=>{
        console.log(err);
        if(err.status == 403){
          this.loginService.on403();
        }else if(err.status == 410){
          this.modalError = "raport został już rozpatrzony, zamknij aby odświeżyć listę";
        }else{
          this.modalError = err.text();
        }
      }
    )
  }

}
