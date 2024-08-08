import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {HttpModule, Http, XHRBackend, RequestOptions, JsonpModule} from '@angular/http';

import { AppComponent } from './app.component';
import {routing} from "./app.routing";
import {LoginComponent} from "./component/login.component";
import {HomeComponent} from "./component/home.component";
import {AdminService} from "./service/admin.service";
import {LoginService} from "./service/login.service";
import {LoggedInGuard} from "./logged-in.guard";
import {LoggedOutGuard} from "./logged-out.guard";
import {ConfigService} from "./service/config.service";
import {CustomHttp} from "./util/custom-http.provider";
import {AccountPanelComponent} from "./component/account-panel.component";
import {AccountService} from "./service/account.service";
import {OfferApprovalComponent} from "./component/offer-approval.component";
import {UsersComponent} from "./component/users.component";
import {AccountSettingsComponent} from "./component/account-settings.component";
import {Ng2CompleterModule} from "ng2-completer/index";
import {ModalModule} from "ng2-modal/index";
import {ReportsComponent} from "./component/reports.component";
import {OfferFrontendComponent} from "./component/offer-frontend.component";
import { L_SEMANTIC_UI_MODULE } from 'angular2-semantic-ui';






@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    LoginComponent,
    AccountPanelComponent,
    OfferApprovalComponent,
    UsersComponent,
    AccountSettingsComponent,
    ReportsComponent,
    OfferFrontendComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    JsonpModule,
    routing,
    Ng2CompleterModule,
    ModalModule,
    L_SEMANTIC_UI_MODULE
  ],
  providers: [
    LoggedInGuard,
    LoggedOutGuard,
    ConfigService,
    LoginService,
    AdminService,
    AccountService,
    { provide: Http,
      useFactory: httpFactory,
      deps: [XHRBackend, RequestOptions]
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

export function httpFactory(backend: XHRBackend, defaultOptions: RequestOptions){
  return new CustomHttp(backend, defaultOptions);
}
