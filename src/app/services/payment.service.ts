import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PaymentService {

  private apiUrl = 'https://your-laravel-api-url.com';  // Ganti dengan URL Laravel Anda

  constructor(private http: HttpClient) {}

  // Fungsi untuk mendownload struk dalam format JPG
  downloadReceipt(transactionId: number): Observable<Blob> {
    const url = `${this.apiUrl}/generate-receipt/${transactionId}`;
    return this.http.get(url, { responseType: 'blob' });
  }
}
