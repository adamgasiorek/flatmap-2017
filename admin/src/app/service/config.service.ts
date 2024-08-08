import {Injectable} from '@angular/core';
import {Http, Response} from "@angular/http";
import {environment} from "../../environments/environment";

@Injectable()
export class ConfigService{

  private  static  backendUrl = environment.backendUrl; //"http://localhost:9999/admin";
  private static frontendUrl = environment.frontendUrl;//"http://164.132.57.18/flatmap";
  public static getBaseUrl():string {
    return ConfigService.backendUrl;
  }

  public static buildUrl(path:string) : string {
    return ConfigService.backendUrl + "/" + path;
  }

  public static extractData(res: Response) {
    let body = res.json();
    return body;
  }

  static getFrontUrlToOffer(id:string) {
    return ConfigService.frontendUrl + "/przegladaj.php?id=" + id;
  }
}
