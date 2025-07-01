import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CommonModule } from '@angular/common';
import { LoginPage } from './login/login.page';
import { SignupPage } from './signup/signup.page';
import { ForgotPasswordPage } from './forgot-password/forgot-password.page';
import { NewPasswordPage } from './new-password/new-password.page';
import { VerifyPage } from './verify/verify.page';
import { ProfilePage } from './profile/profile.page';
import { CompleteProfilePage } from './complete-profile/complete-profile.page';
import { HomePage } from './home/home.page';


// Define the routes for the customer module
const routes: Routes = [
  { path: 'courier/login', component: LoginPage },
  { path: 'courier/signup', component: SignupPage },
  { path: 'forgot-password', component: ForgotPasswordPage },
  { path: 'new-password', component: NewPasswordPage },
  { path: 'courier/verify', component: VerifyPage },
  { path: 'complete-profile', component: CompleteProfilePage },
  { path: 'courier/home', component: HomePage },
  { path: 'courier/profile', component: ProfilePage },
  { path: 'courier/express', component: ExpressPage },
  { path: 'courier/reguler', component: RegulerPage },
  { path: '', redirectTo: 'courier/home', pathMatch: 'full' },  // Default route
];

@NgModule({
  imports: [RouterModule.forChild(routes), CommonModule], // Add CommonModule for common directives
  exports: [RouterModule], // Export RouterModule so it can be used in other modules
})
export class CustomerRoutingModule {}
