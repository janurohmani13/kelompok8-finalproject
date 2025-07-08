import { Injectable } from '@angular/core';
import { Observable, throwError, from } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

@Injectable({
  providedIn: 'root',
})
export class TransactionService {

  // Replace with the URL of your Laravel API
  private endpoint = '/transactions';


  constructor() {}

  // Function to get all transactions
  getTransactions(status: string): Observable<any> {
    const params = { status };
    return from(axiosInstance.get(this.endpoint, { params, headers: this.getAuthHeaders() })).pipe(
      map(response => response.data),
      catchError(this.handleError)
    );
  }

  // Function to get transaction details by ID
  getTransactionById(id: number): Observable<any> {
    return from(axiosInstance.get(`${this.endpoint}/${id}`, { headers: this.getAuthHeaders() })).pipe(
      map(response => response.data),
      catchError(this.handleError)
    );
  }

  // Function to create a new transaction
  createTransaction(transactionData: any): Observable<any> {
    return from(axiosInstance.post(this.endpoint, transactionData, { headers: this.getAuthHeaders() })).pipe(
      map(response => response.data),
      catchError(this.handleError)
    );
  }

  // Function to update transaction status
  updateTransactionStatus(id: number, statusData: any): Observable<any> {
    return from(axiosInstance.put(`${this.endpoint}/${id}/status`, statusData, { headers: this.getAuthHeaders() })).pipe(
      map(response => response.data),
      catchError(this.handleError)
    );
  }

  // Function to get categorized transactions
  getStatusTransactions(): Observable<any> {
    const token = localStorage.getItem('token');
    if (!token) {
      console.error('No token found in localStorage');
      return throwError('No token found in localStorage');
    }

    const headers = {
      'Authorization': `Bearer ${token}`,
    };

    return from(axiosInstance.get(`${this.endpoint}/status`, { headers })).pipe(
      map(response => response.data),
      catchError(this.handleError)
    );
  }

  // Private method to get auth headers
  private getAuthHeaders() {
    const token = localStorage.getItem('token');
    console.log('Auth Token:', token); // Debug token
    return {
      Authorization: token ? `Bearer ${token}` : '',
      Accept: 'application/json',
      'Content-Type': 'application/json',
    };
  }

  // Error handling method for HTTP requests
  private handleError(error: any): Observable<never> {
    console.error('An error occurred:', error);
    return throwError('Something went wrong; please try again later.');
  }
}
