
import {Router, Routes, RouterModule} from "@angular/router";
import {ModuleWithProviders} from "@angular/core";
import {LoggedInGuard} from "./logged-in.guard";
import {LoggedOutGuard} from "./logged-out.guard";
import {LoginComponent} from "./component/login.component";
import {HomeComponent} from "./component/home.component";
import {OfferApprovalComponent} from "./component/offer-approval.component";
import {UsersComponent} from "./component/users.component";
import {AccountSettingsComponent} from "./component/account-settings.component";
import {ReportsComponent} from "./component/reports.component";
const appRoutes: Routes = <Routes>[
  {
    path: '',
    component: LoginComponent,
    canActivate: [LoggedOutGuard]
  },
  {
    path: 'home',
    component: HomeComponent,
    canActivate: [LoggedInGuard],
    children: [
      { path: 'offerApproval', component: OfferApprovalComponent, outlet:'admin-router'},
      { path: 'users', component: UsersComponent, outlet:'admin-router'},
      { path: 'accountSettings', component: AccountSettingsComponent, outlet:'admin-router'},
      { path: 'reports', component: ReportsComponent, outlet:'admin-router'}
    ]
  }

];

export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
