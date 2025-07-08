import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule, LoadingController, AlertController } from '@ionic/angular';  // <-- Make sure this is imported
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { firstValueFrom } from 'rxjs';

// Interface untuk error response
interface ApiError {
  status?: number;
  error?: {
    message?: string;
  };
  message?: string;
}

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule],  // <-- Ensure IonicModule is included
})
export class LoginPage {
  email = '';
  password = '';

  constructor(
    private router: Router,
    private authService: AuthService,
    private loadingCtrl: LoadingController,
    private alertCtrl: AlertController
  ) {}

  async onLogin() {
    // Tambahkan log untuk memastikan fungsi terpanggil
    console.log('onLogin dipanggil, email:', this.email);

    if (!this.email || !this.password) {
      this.showAlert('Info', 'Silakan isi semua field.');
      return;
    }

    const loading = await this.loadingCtrl.create({
      message: 'Sedang login...',
      spinner: 'circles'
    });

    await loading.present();

    const credentials = {
      email: this.email,
      password: this.password
    };

    try {
      // Menggunakan Promise langsung untuk login
      const response = await this.authService.loginWithPromise(credentials);
      console.log('Login berhasil dengan promise:', response);
      
      await loading.dismiss();

      if (response && response.data && response.data.token) {
        this.authService.saveUser(response.data);

        const isVerified = response.data.user.email_verified_at !== null;

        if (isVerified) {
          this.router.navigate(['/home']);
        } else {
          this.showAlert('Verifikasi Email', 'Silakan verifikasi email Anda sebelum melanjutkan.');
          this.router.navigate(['/verify'], {
            queryParams: { email: this.email }
          });
        }
      } else {
        this.showAlert('Error', 'Respons login tidak sesuai format.');
      }
    } catch (error: unknown) {
      console.error('Login Error:', error);
      await loading.dismiss();

      // Konversi error ke tipe yang kita tetapkan
      const err = error as ApiError;

      if (err.status === 403 && err.error?.message?.includes('verify')) {
        this.showAlert('Verifikasi Email', 'Silakan verifikasi email Anda sebelum melanjutkan.');
        this.router.navigate(['/verify'], {
          queryParams: { email: this.email }
        });
      } else {
        const errorMessage = err.error?.message || err.message || 'Gagal login. Silakan coba lagi.';
        this.showAlert('Login Gagal', errorMessage);
      }
    }
  }

  async showAlert(header: string, message: string) {
    const alert = await this.alertCtrl.create({
      header,
      message,
      buttons: ['OK']
    });
    await alert.present();
  }

  goToSignup() {
    this.router.navigate(['/signup']);
  }

  goToForgotPassword() {
    this.router.navigate(['/forgot-password']);
  }
}
