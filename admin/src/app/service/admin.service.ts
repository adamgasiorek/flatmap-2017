import {Injectable} from "@angular/core";
import {Http, Response} from "@angular/http";
import {Observable} from "rxjs/Rx";
import {LoginService} from "./login.service";
import {ConfigService} from "./config.service";
import {Offer} from "../model/offer.model";
import {User} from "../model/user.model";
import {CompleterService} from "ng2-completer/index";
import {CustomRemoteData} from "./custom-remote-data.service";
import {Report} from "../model/report.model";

@Injectable()
export class AdminService{
  constructor(private http:Http){}

  getOffersToApproval(): Observable<Offer[]>{
    let url = ConfigService.buildUrl('getNotAcceptedOffers');
    return this.http.get(url,LoginService.generateAuthGetRequestOptions())
      .map(ConfigService.extractData);
  }

  public customRemote(): CustomRemoteData {

    let remoteData = new CustomRemoteData(this.http);
    return remoteData
      .remoteUrl(ConfigService.buildUrl('getUsers?name='))
      .searchFieldss('email')
      .titleField('email');
  }

  addPoints(userId:number, pointsCount:number, reason:string):Observable<any> {
    let url = ConfigService.buildUrl('addPoints');
    let body = JSON.stringify({userId, pointsCount, reason});
    return this.http.post(url,body,LoginService.generateAuthRequestOptions());
  }

  getUserById(id:string):Observable<User> {
    let url = ConfigService.buildUrl('getUser?id='+id);
    return this.http.get(url,LoginService.generateAuthGetRequestOptions())
      .map(ConfigService.extractData);
  }

  acceptOffer(offerId:number):Observable<Response> {
    let url = ConfigService.buildUrl('acceptOffer');
    let body = JSON.stringify({offerId});
    return this.http.post(url,body,LoginService.generateAuthRequestOptions());
  }


  rejectOffer(offerId:number, reason:string) {
    let url = ConfigService.buildUrl('rejectOffer');
    let body = JSON.stringify({offerId,reason});
    return this.http.post(url,body,LoginService.generateAuthRequestOptions());
  }

  getReports():Observable<Report[]> {
    let url = ConfigService.buildUrl('getReports');
    return this.http.get(url,LoginService.generateAuthGetRequestOptions())
      .map(ConfigService.extractData);
  }

  ignoreReport(reportId:number) {
    let url = ConfigService.buildUrl('ignoreReport');
    let body = JSON.stringify({reportId});
    return this.http.post(url,body,LoginService.generateAuthRequestOptions());
  }

  banOfferByReport(reportId:number, banReason:string) {
    let url = ConfigService.buildUrl('banOfferByReport');
    let body = JSON.stringify({reportId, banReason});
    return this.http.post(url,body,LoginService.generateAuthRequestOptions());
  }
}
