import {Component, OnInit} from "@angular/core";
import {AccountService} from "../service/account.service";
import {LoginService} from "../service/login.service";
import {Router} from "@angular/router";
import {MyUser} from "../model/my-user.model";
@Component({
  selector: 'account-panel',
  templateUrl: '../view/account-panel.view.html'
})
export class AccountPanelComponent implements OnInit{

  private user:MyUser;

  constructor(private loginService:LoginService, private accountService:AccountService, private router:Router){}

  ngOnInit():void {
    this.accountService.getMyUser().subscribe(
      (res:MyUser)=>{
        this.user=res;
        console.info(res);
      },
      (err)=>{
        if(err.status == 403){
          this.logout();
        }else{
          console.info(err);
        }
      }
    )
  }

  private navigateOfferApproval(){
    this.router.navigate(['home', { outlets: {'admin-router':['offerApproval'] }}]);
    return false;
  }

  private navigateUsers(){
    this.router.navigate(['home', { outlets: {'admin-router':['users'] }}]);
    return false;
  }

  private navigateAccountSettings(){
    this.router.navigate(['home', { outlets: {'admin-router':['accountSettings'] }}]);
    return false;
  }
  
  private navigateReports(){
    this.router.navigate(['home', { outlets: {'admin-router':['reports'] }}]);
    return false;
  }

  private logout(){
    this.loginService.logout().subscribe(
      (res)=>{
        console.info(res);
        LoginService.onLoggedOut();
        this.router.navigate(['']);
      },
      (err)=>{
        console.info(err);
        LoginService.onLoggedOut();
        this.router.navigate(['']);
      }
    );
    return false;
  }
}
