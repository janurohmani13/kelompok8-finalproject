import { Routes } from '@angular/router';

export const routes: Routes = [
  {
    path: 'home',
    loadComponent: () => import('./home/home.page').then((m) => m.HomePage),
  },
  {
    path: '',
    loadComponent: () => import('./splash/splash.page').then( m => m.SplashPage)
  },
  {
    path: 'login',
    loadComponent: () => import('./login/login.page').then( m => m.LoginPage)
  },
  {
    path: 'signup',
    loadComponent: () => import('./signup/signup.page').then( m => m.SignupPage)
  },
  {
    path: 'forgot-password',
    loadComponent: () => import('./forgot-password/forgot-password.page').then( m => m.ForgotPasswordPage)
  },
  {
    path: 'new-password',
    loadComponent: () => import('./new-password/new-password.page').then( m => m.NewPasswordPage)
  },
  {
    path: 'splash-restore',
    loadComponent: () => import('./splash-restore/splash-restore.page').then( m => m.SplashRestorePage)
  },
  {
    path: 'splash-complete',
    loadComponent: () => import('./splash-complete/splash-complete.page').then( m => m.SplashCompletePage)
  },
  {
    path: 'verify',
    loadComponent: () => import('./verify/verify.page').then( m => m.VerifyPage)
  },
  {
    path: 'complete-profile',
    loadComponent: () => import('./complete-profile/complete-profile.page').then( m => m.CompleteProfilePage)
  },

 
];
