import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CustomerRoutingModule } from './customer-routing.module';
import { LoginPage } from './login/login.page';
import { SignupPage } from './signup/signup.page';
import { ForgotPasswordPage } from './forgot-password/forgot-password.page';
import { NewPasswordPage } from './new-password/new-password.page';
import { VerifyPage } from './verify/verify.page';
import { CompleteProfilePage } from './complete-profile/complete-profile.page';
import { HomePage } from './home/home.page';
import { PaymentPage } from './payment/payment.page';
import { TransactionSuccessPage } from './transaction-success/transaction-success.page';
import { CommonModule, CurrencyPipe } from '@angular/common'; 

@NgModule({
  declarations: [
    LoginPage,
    SignupPage,
    ForgotPasswordPage,
    NewPasswordPage,
    VerifyPage,
    CompleteProfilePage,
    HomePage,
    PaymentPage,
    TransactionSuccessPage  // Declare TransactionSuccessPage here
  ],
  imports: [
    CommonModule,
    IonicModule,
    FormsModule,
    ReactiveFormsModule,
    CustomerRoutingModule
  ],
  providers: [CurrencyPipe], 
  schemas: [CUSTOM_ELEMENTS_SCHEMA]  // Add CUSTOM_ELEMENTS_SCHEMA to handle custom web components
})
export class CustomerModule {}
