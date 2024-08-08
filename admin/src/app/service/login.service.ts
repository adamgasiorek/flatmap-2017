
import {Injectable} from "@angular/core";
import {Http, Response, Headers, RequestOptions} from "@angular/http";
import {Observable} from "rxjs/Rx";
import {ConfigService} from "./config.service";
import {Router} from "@angular/router";
@Injectable()
export class LoginService {

  public static TOKEN_KEY:string = 'A-Auth-Token';

  constructor(private http: Http, private router:Router){}

  login(login:String, password:String):Observable<Response> {
    let url = ConfigService.buildUrl("session/login");
    let body = JSON.stringify({login, password});
    let headers = new Headers({'Content-Type': 'application/json'});
    let options = new RequestOptions({ headers});
    return this.http.post(url,body,options);
  }

  logout() {
    let url = ConfigService.buildUrl("session/logout");
    return this.http.post(url,{}, LoginService.generateAuthRequestOptions());
  }

  public static isLogged():boolean {
    return localStorage.getItem(LoginService.TOKEN_KEY) !=null;
  }

  public static onLoggedIn(res:string) {
    localStorage.setItem(LoginService.TOKEN_KEY, res);
  }

  public static onLoggedOut() {
    localStorage.removeItem(LoginService.TOKEN_KEY);
  }

  public static generateAuthRequestOptions(){
    let headers = new Headers({'Content-Type': 'application/json', 'X-Auth-Token':localStorage.getItem(LoginService.TOKEN_KEY)});
    let options = new RequestOptions({ headers});
    return options;
  }

  public static generateAuthGetRequestOptions(){
    let headers = new Headers({'Content-Type': 'application/json', 'X-Auth-Token':localStorage.getItem(LoginService.TOKEN_KEY)});
    let options = new RequestOptions({ headers, body: ""});
    return options;
  }

  on403() {
    LoginService.onLoggedOut();
    this.router.navigate(['']);
  }
}
