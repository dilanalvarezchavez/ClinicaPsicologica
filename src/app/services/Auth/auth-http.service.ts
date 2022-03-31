import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { ServerResponse } from '../../models/serve-response/serve-response.model';
import { Handler } from '../../exceptions/handler';
import { environment } from '../../../environments/environment';
import { LoginModel } from '../../models/login/login.model';

@Injectable({
  providedIn: 'root'
})
export class AuthHttpService {
  API_URL_LOGIN: string = environment.API_URL;

  constructor(private httpClient: HttpClient) { }
  login(credentials: LoginModel): Observable<ServerResponse> {
    const url = `${this.API_URL_LOGIN}/auth/login`;
    return this.httpClient.post<ServerResponse>(url, credentials)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );
  }

}