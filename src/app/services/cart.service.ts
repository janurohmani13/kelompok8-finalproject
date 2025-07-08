import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

export interface CartItem {
  id: number;
  product: {
    id: number;
    name: string;
    price: number;
    image?: string;
  };
  quantity: number;
}

@Injectable({
  providedIn: 'root',
})
export class CartService {
  private endpoint = '/cart';

  constructor() {}

  private getAuthHeaders() {
    const token = localStorage.getItem('token');
    console.log('Auth Token:', token); // Debug token
    return {
      Authorization: token ? `Bearer ${token}` : '',
      Accept: 'application/json',
      'Content-Type': 'application/json',
    };
  }

  getCartItems(userId: number): Observable<CartItem[]> {
    return from(axiosInstance.get(`${this.endpoint}/${userId}`, {
      headers: this.getAuthHeaders(),
    })).pipe(
      map(response => response.data)
    );
  }

  addCartItem(data: {
    user_id: number;
    product_id: number;
    quantity: number;
  }): Observable<any> {
    return from(axiosInstance.post(this.endpoint, data, {
      headers: this.getAuthHeaders(),
    })).pipe(
      map(response => response.data)
    );
  }

  updateCartItem(cartItemId: number, quantity: number): Observable<any> {
    return from(axiosInstance.put(
      `${this.endpoint}/${cartItemId}`,
      { quantity },
      { headers: this.getAuthHeaders() }
    )).pipe(
      map(response => response.data)
    );
  }

  deleteCartItem(cartItemId: number): Observable<any> {
    return from(axiosInstance.delete(`${this.endpoint}/${cartItemId}`, {
      headers: this.getAuthHeaders(),
    })).pipe(
      map(response => response.data)
    );
  }
}
