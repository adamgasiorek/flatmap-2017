

import {Component} from "@angular/core";
import {Router} from "@angular/router";
import {AdminService} from "../service/admin.service";
@Component({
  selector: 'home',
  templateUrl: '../view/home.view.html'
})
export class HomeComponent {
  constructor(private adminService:AdminService, private router:Router){
    
  }
  
  
}
