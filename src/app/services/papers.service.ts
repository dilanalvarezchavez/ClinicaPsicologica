import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';

import { ServerResponse } from '../models/serve-response/serve-response.model';
import { Observable } from 'rxjs';
import { PaperModel } from '../models/paper/paper.model';
import { catchError, map } from 'rxjs/operators';
import { Handler } from '../exceptions/handler';

@Injectable({
  providedIn: 'root'
})
export class PaperService {

  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) {

  }
  //metodos para recuperar datos del  backend
  getAll(): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers`;
    return this.httpClient.get<ServerResponse>(url)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );
  }
  getOne(id: number | undefined): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers/${id}`;
    return this.httpClient.get<ServerResponse>(url)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );;
  }
  Update(id: number | undefined, paper: PaperModel): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers/${id}`;
    return this.httpClient.put<ServerResponse>(url, paper)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );;
  }
  Store(paper: PaperModel): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers`;
    return this.httpClient.post<ServerResponse>(url, paper)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );
  }
  destroy(id: number | undefined): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );
  }
  destroys(ids: (number | undefined)[]): Observable<ServerResponse> {
    const url: string = `${this.API_URL}/papers/destroys`;
    return this.httpClient.patch<ServerResponse>(url, { ids })
      .pipe(
        map(response => response),
        catchError(Handler.render)
      );
  }
}