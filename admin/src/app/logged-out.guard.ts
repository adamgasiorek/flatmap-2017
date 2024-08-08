
import {Injectable} from "@angular/core";
import {Router, CanActivate, RouterStateSnapshot, ActivatedRouteSnapshot} from "@angular/router";
import {Observable} from "rxjs/Rx";
import {LoginService} from "./service/login.service";
@Injectable()
export class LoggedOutGuard implements CanActivate {

  constructor(private router: Router){}

  canActivate(route:ActivatedRouteSnapshot, state:RouterStateSnapshot):Observable<boolean>|Promise<boolean>|boolean {
    if(!LoginService.isLogged()){
      return true;
    }else{
      this.router.navigate(['home']);
      return false;
    }
  }
}
