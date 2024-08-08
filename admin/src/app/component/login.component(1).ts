import {Component} from "@angular/core";
import {LoginService} from "../service/login.service";
import {Router} from "@angular/router";
@Component({
  selector: 'login',
  templateUrl: '../view/login.view.html'
})
export class LoginComponent {
  login:string;
  password:string;
  error:string;

  constructor(private loginService:LoginService, private router:Router){}

  public onLoginSubmit(){

    if(this.login == null || this.login.length<1 || this.password == null || this.password.length <1){
      this.error = "podaj login i hasło";
      return;
    }

    this.loginService.login(this.login,this.password).subscribe(
      (res)=>{
        LoginService.onLoggedIn(res.text());
        this.router.navigate(['home']);
      },
      (err)=>{
        if(err.status == 403){
          this.error = "Nieprawidłowe dane do logowania";
        }else{
          console.info(err);
          this.error = err.text();
        }
      }
    )
  }

  public onFocus(){
    this.error = null;
  }
}
