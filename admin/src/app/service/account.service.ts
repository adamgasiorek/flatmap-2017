import {Injectable} from "@angular/core";
import {Http, Response} from "@angular/http";
import {Observable} from "rxjs/Rx";
import 'rxjs/add/operator/map';
import {ConfigService} from "./config.service";
import {LoginService} from "./login.service";
import {MyUser} from "../model/my-user.model";

@Injectable()
export class AccountService{
  constructor(private http:Http){}

  public getMyUser():Observable<MyUser> {
    let url = ConfigService.buildUrl('account/get');
    return this.http.get(url,LoginService.generateAuthGetRequestOptions())
      .map(ConfigService.extractData);
  }

 
}
