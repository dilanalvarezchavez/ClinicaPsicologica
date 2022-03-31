import { CUSTOM_ELEMENTS_SCHEMA, NgModule } from '@angular/core';
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { RouterModule } from '@angular/router';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { LoginComponent } from './components/auth/login/login.component';
import { DataComponent } from './components/data/data.component';
import { UserComponent } from './components/user/user.component';
import { PaperComponent } from './components/paper/paper.component';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatSliderModule } from '@angular/material/slider';
import { SideNavComponent } from './components/layout/side-nav/side-nav.component';
import { ToolbarComponent } from './components/layout/toolbar/toolbar.component';
import { MatToolbarModule } from '@angular/material/toolbar';

import { TokenInterceptor } from "./interceptors/token.interceptor";
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { AuthGuard } from "./guards/auth.guard";
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { MatTableModule } from '@angular/material/table';
import { MatTableExporterModule } from 'mat-table-exporter';







@NgModule({
  exports: [MatSidenavModule],
  declarations: [
    AppComponent,
    DashboardComponent,
    LoginComponent,
    DataComponent,
    UserComponent,
    PaperComponent,
    SideNavComponent,
    ToolbarComponent
  ],
  imports: [
    BrowserAnimationsModule,
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatSliderModule,
    MatToolbarModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    CommonModule,
    MatTableModule,
    MatTableExporterModule
  ],
  providers: [
    AuthGuard,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: TokenInterceptor,
      multi: true
    },
  ],
  bootstrap: [AppComponent],
  schemas: [
    CUSTOM_ELEMENTS_SCHEMA
  ]

})
export class AppModule { }
