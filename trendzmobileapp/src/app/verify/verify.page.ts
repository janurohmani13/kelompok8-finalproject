import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-verify',
  templateUrl: './verify.page.html',
  styleUrls: ['./verify.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule],
})
export class VerifyPage {
  email = '';
  password = '';
  otp1: string = '';
  otp2: string = '';
  otp3: string = '';
  otp4: string = '';

  constructor(private router: Router) {}

  onVerify() {
    this.router.navigate(['/complete-profile']);
  }

  goToSignup() {
    this.router.navigate(['/signup']);
  }

  goToForgotPassword() {
    this.router.navigate(['/forgot-password']);
  }

  moveToNext(event: any, nextInput: HTMLInputElement) {
    const input = event.target;
    if (input.value && input.value.length === 1) {
      nextInput.value = '';
      nextInput.focus();
    }
  }

  resendCode() {
  }
}

