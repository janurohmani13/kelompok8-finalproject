// src/app/services/shipping.service.ts
import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

@Injectable({
  providedIn: 'root'
})
export class ShippingService {

  constructor() {}

  getCities(): Observable<any> {
    return from(axiosInstance.get('/cities')).pipe(
      map(response => response.data)
    );
  }

  getCost(data: { origin: string; destination: string; weight: number; courier: string }): Observable<any> {
    return from(axiosInstance.post('/cost', data)).pipe(
      map(response => response.data)
    );
  }

  getShippingOptions(data: { destination: string; courier: string }): Observable<any> {
    return from(axiosInstance.post('/shipping/options', data)).pipe(
      map(response => response.data)
    );
  }

  saveDelivery(data: any): Observable<any> {
    return from(axiosInstance.post('/delivery', data)).pipe(
      map(response => response.data)
    );
  }
}
