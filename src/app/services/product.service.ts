import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

export interface Product {
  id: number;
  name: string;
  price: number;
  image: string;
  category: {
    id: number;
    name: string;
  };
  description?: string;
}

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  private endpoint = '/products';

  constructor() {}

  getProducts(): Observable<Product[]> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`
    };

    return from(axiosInstance.get(this.endpoint, { headers })).pipe(
      map(response => response.data)
    );
  }
}
