import {Injectable} from "@angular/core";
import {CompleterData, CompleterBaseData} from "ng2-completer/index";
import {Subscription} from "rxjs/Rx";
import {Headers, Http,Response} from "@angular/http";
import {LoginService} from "./login.service";

@Injectable()
export class CustomRemoteData extends CompleterBaseData{
  private _remoteUrl: string;
  private remoteSearch: Subscription;
  private _dataField: string = null;


  constructor(private http: Http) {
    super();
  }

  public remoteUrl(remoteUrl: string) {
    this._remoteUrl = remoteUrl;
    return this;
  }


  public dataField(dataField: string) {
    this._dataField = dataField;
  }


  public search(term: string): void {
    this.cancel();

    let url = this._remoteUrl + term;


    this.remoteSearch = this.http.get(url, LoginService.generateAuthGetRequestOptions())
      .map((res: Response) => res.json())
      .map((data: any) => {
        let matchaes = this.extractValue(data, this._dataField);
        return this.extractMatches(matchaes, term);
      })
      .map(
        (matches: any[]) => {
          let results = this.processResults(matches);
          this.next(results);
          return results;
        })
      .catch((err) => {
        this.error(err);
        return null;
      })
      .subscribe();
  }

  public cancel() {
    if (this.remoteSearch) {
      this.remoteSearch.unsubscribe();
    }
  }
}
