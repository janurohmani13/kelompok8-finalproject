import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { axiosInstance } from 'src/lib/axios';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = environment.apiUrl; // Menggunakan apiUrl dari environment

  constructor(private http: HttpClient) {}

  // Register Customer
  registerCustomer(data: any): Promise<any> {
    return axiosInstance.post("/register/customer", data)
      .then(response => {
        console.log('Registration response:', response);
        return response;
      })
      .catch(error => {
        console.error('Registration error details:', error);
        throw error;
      });
  }

  // Login Customer
  loginCustomer(credentials: any): Observable<any> {
    console.log('loginCustomer dipanggil dengan:', credentials);
    
    // Menggunakan axios untuk menghindari masalah CORS
    return from(
      axiosInstance.post("/login/customer", credentials)
        .then(response => {
          console.log('Login response dari server:', response);
          // Pastikan struktur data sesuai yang diharapkan
          if (response && response.data) {
            return response;
          } else {
            // Jika struktur tidak sesuai, konversi ke format yang diharapkan
            return {
              data: response
            };
          }
        })
        .catch(error => {
          console.error('Login error details:', error);
          throw error;
        })
    ).pipe(
      map(response => {
        console.log('Mapped response:', response);
        return response;
      })
    );
  }

  // Register Admin
  registerAdmin(data: any): Observable<any> {
    return from(axiosInstance.post("/register/admin", data)).pipe(
      map(response => response.data)
    );
  }

  // Login Admin
  loginAdmin(credentials: any): Observable<any> {
    return from(axiosInstance.post("/login/admin", credentials)).pipe(
      map(response => response.data)
    );
  }

  // Simpan user dan token ke localStorage
  saveUser(data: any): void {
    const user = data.user;

    if (user) {
      localStorage.setItem('user', JSON.stringify(user));
      localStorage.setItem('user_id', String(user.id));
    }

    if (data.token) {
      localStorage.setItem('token', data.token);
    }
  }

  // Logout (butuh token)
  logout(): Observable<any> {
    const token = this.getToken();
    const headers = {
      Authorization: `Bearer ${token}`
    };

    return from(axiosInstance.post("/logout", {}, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Ambil user dari localStorage
  getUser(): any {
    const userStr = localStorage.getItem('user');
    if (!userStr) return null;

    try {
      return JSON.parse(userStr);
    } catch (e) {
      console.error('Gagal parse user JSON:', e);
      return null;
    }
  }

  // Ambil token dari localStorage
  getToken(): string | null {
    return localStorage.getItem('token');
  }

  // Cek apakah user login
  isLoggedIn(): boolean {
    return !!this.getToken();
  }

  // Cek apakah email user sudah diverifikasi
  isVerified(): boolean {
    const user = this.getUser();
    return user?.email_verified_at != null;
  }

  // Verifikasi email (OTP)
  verifyEmail(data: { email: string; code: string }): Observable<any> {
    return from(axiosInstance.post("/verify-email", data)).pipe(
      map(response => response.data)
    );
  }

  // Kirim ulang verifikasi (butuh token)
  resendVerificationEmail(): Observable<any> {
    const token = this.getToken();
    const headers = {
      Authorization: `Bearer ${token}`
    };

    return from(axiosInstance.post("/resend-verification", {}, { headers })).pipe(
      map(response => response.data)
    );
  }

  // Login dengan Promise (alternatif)
  loginWithPromise(credentials: any): Promise<any> {
    console.log('loginWithPromise dipanggil dengan:', credentials);
    
    return axiosInstance.post("/login/customer", credentials)
      .then(response => {
        console.log('Login response dari promise:', response);
        return response.data;
      })
      .catch(error => {
        console.error('Login promise error:', error);
        throw error;
      });
  }

  // Ambil data user lengkap dari /api/profile

}
