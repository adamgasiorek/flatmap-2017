import {Injectable} from "@angular/core";
import {Http, ConnectionBackend, Request, Response, RequestOptionsArgs, RequestOptions} from "@angular/http";
import {Observable} from "rxjs";

@Injectable()
export class CustomHttp extends Http {


  constructor(backend: ConnectionBackend, defaultOptions: RequestOptions) {
    super(backend, defaultOptions);

  }

  get(url: string, options?: RequestOptionsArgs): Observable<Response> {
    console.info("GET " + url);
    return super.get(url, options);
  }


  post(url: string, body: any, options?: RequestOptionsArgs): Observable<Response> {
    console.info("POST " + url + "\n" + body);
    return super.post(url, body, options);
  }
}
