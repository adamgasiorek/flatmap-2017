import {Component, OnInit} from "@angular/core";
import {User} from "../model/user.model";
import {AdminService} from "../service/admin.service";
import {CompleterData, CompleterService, CompleterItem} from "ng2-completer/index";
import {Modal, ModalContent} from "ng2-modal";
import {LoginService} from "../service/login.service";

@Component({
  selector: 'userz',
  templateUrl: '../view/users.view.html'
})
export class UsersComponent{

  private selectedUser:User;
  private dataService: CompleterData;
  private typedText:string;
  private addPointsCount:number;
  private reasonAddPoints:string;
  private modalError:string;

  constructor(private adminService:AdminService, private loginService:LoginService){
    this.dataService = adminService.customRemote();
  }

  userSelected(selected: CompleterItem){
    this.selectedUser=selected.originalObject;
    console.info(selected.originalObject);
  }

  addPoints(addPointsModal){
    this.modalError = null;
    if(this.addPointsCount == null || this.addPointsCount == 0){
      this.modalError = "podaj ilość punktów";
      return;
    }

    if(this.reasonAddPoints == null){
      this.modalError = "podaj powód";
      return;
    }

    if(this.reasonAddPoints.trim().length < 6){
      this.modalError = "za krótki powód";
      return;
    }

    this.adminService.addPoints(this.selectedUser.id, this.addPointsCount, this.reasonAddPoints).subscribe(
      (res)=>{
        this.refreshSelectedUser();
        addPointsModal.close();
      },
      (err)=>{
        console.info(err);
        err = err.json();
        if(err.status == 401 || err.status == 403){
          this.loginService.on403();
        }else{
          this.modalError = err;
        }
      }
    )
  }

  private refreshSelectedUser() {
    if(this.selectedUser){
      this.adminService.getUserById(this.selectedUser.id).subscribe(
        (res)=>{
          if(this.selectedUser.email == res.email){
            this.selectedUser = res;
          }
        }
      )
    }
  }
}
