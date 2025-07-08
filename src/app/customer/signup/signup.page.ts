import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule, LoadingController, AlertController } from '@ionic/angular';
import { Router } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from 'src/app/services/auth.service';

// Interface untuk error response
interface ApiError {
  status?: number;
  error?: {
    message?: string;
  };
  message?: string;
  response?: {
    data?: {
      message?: string;
    }
  }
}

@Component({
  selector: 'app-signup',
  templateUrl: './signup.page.html',
  styleUrls: ['./signup.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, HttpClientModule],
})
export class SignupPage {
  username = '';
  email = '';
  password = '';
  password_confirmation = '';
  acceptedTerms = false;

  constructor(
    private router: Router, 
    private authService: AuthService,
    private loadingCtrl: LoadingController,
    private alertCtrl: AlertController
  ) {}

  async onRegister() {
    if (!this.username || !this.email || !this.password || !this.password_confirmation) {
      this.showAlert('Info', 'Silakan isi semua field.');
      return;
    }

    if (this.password !== this.password_confirmation) {
      this.showAlert('Info', 'Password dan konfirmasi tidak cocok.');
      return;
    }

    if (!this.acceptedTerms) {
      this.showAlert('Info', 'Silakan setujui Syarat & Ketentuan.');
      return;
    }

    const loading = await this.loadingCtrl.create({
      message: 'Sedang mendaftar...',
      spinner: 'circles'
    });

    await loading.present();

    const registerData = {
      name: this.username,
      email: this.email,
      password: this.password,
      password_confirmation: this.password_confirmation
    };

    try {
      const res = await this.authService.registerCustomer(registerData);
      
      await loading.dismiss();
      
      if (res && res.data) {
        this.showAlert('Sukses', res.data.message || 'Pendaftaran berhasil.');
        this.authService.saveUser(res.data); // Save user data and token

        // Navigate to the verification page
        this.router.navigate(['/verify'], {
          queryParams: { email: res.data.user.email },
        });
      }
    } catch (error: unknown) {
      await loading.dismiss();
      console.error('Registration error:', error);
      
      // Konversi error ke tipe yang kita tetapkan
      const err = error as ApiError;
      
      const errorMessage = 
        err.error?.message || 
        err.message || 
        err.response?.data?.message || 
        'Pendaftaran gagal. Silakan coba lagi.';
        
      this.showAlert('Pendaftaran Gagal', errorMessage);
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

  goToLogin() {
    this.router.navigate(['/login']);
  }
}
