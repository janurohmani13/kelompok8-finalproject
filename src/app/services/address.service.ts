import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

@Injectable({
  providedIn: 'root',
})
export class AddressService {
  private endpoint = '/addresses'; // API endpoint

  constructor() {}

  // Ambil semua alamat pengguna
  getAddresses(): Observable<any[]> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`,
    };
    return from(axiosInstance.get(this.endpoint, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Menambahkan alamat baru
  addAddress(addressData: any): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`,
    };
    return from(axiosInstance.post(this.endpoint, addressData, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Mengambil alamat berdasarkan ID
  getAddressById(addressId: number): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`,
    };
    return from(axiosInstance.get(`${this.endpoint}/${addressId}`, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Memperbarui alamat
  updateAddress(addressId: number, addressData: any): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`,
    };
    return from(axiosInstance.put(`${this.endpoint}/${addressId}`, addressData, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Menghapus alamat
  deleteAddress(addressId: number): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = {
      Authorization: `Bearer ${token}`,
    };
    return from(axiosInstance.delete(`${this.endpoint}/${addressId}`, { headers })).pipe(
      map(response => response.data)
    );
  }
}
