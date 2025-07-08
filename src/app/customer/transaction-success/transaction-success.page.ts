import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-transaction-success',
  templateUrl: './transaction-success.page.html',
  styleUrls: ['./transaction-success.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule]
})
export class TransactionSuccessPage implements OnInit {
  orderId: string | null = null;
  status: string | null = null;
  transactionStatus: string | null = null;

  constructor(
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {
    console.log('Transaction Success Page Initialized');
    
    // 1. Ambil parameter dari URL menggunakan window.location karena ini lebih langsung
    const urlParams = new URLSearchParams(window.location.search);
    this.orderId = urlParams.get('order_id');
    this.status = urlParams.get('status_code') === '200' ? 'Sukses' : 'Pending';
    this.transactionStatus = urlParams.get('transaction_status');
    
    console.log('URL Search params:', window.location.search);
    console.log('Parsed URL params directly:', {
      orderId: this.orderId,
      status: this.status,
      transactionStatus: this.transactionStatus
    });
    
    // 2. Backup method menggunakan ActivatedRoute jika diperlukan
    if (!this.orderId) {
      this.activatedRoute.queryParams.subscribe(params => {
        console.log('Query Params from ActivatedRoute:', params);
        this.orderId = params['order_id'] || null;
        this.status = params['status_code'] === '200' ? 'Sukses' : 'Pending';
        this.transactionStatus = params['transaction_status'] || null;
        
        console.log('Extracted data from ActivatedRoute:', {
          orderId: this.orderId,
          status: this.status,
          transactionStatus: this.transactionStatus
        });
      });
    }

    // 3. Jika semua metode di atas gagal, cari di localStorage
    if (!this.orderId) {
      try {
        const lastTransactionId = localStorage.getItem('lastTransactionId');
        if (lastTransactionId) {
          this.orderId = 'TRENZ-' + lastTransactionId;
          this.status = 'Sukses';
          this.transactionStatus = 'settlement';
          
          console.log('Using transaction ID from localStorage:', this.orderId);
        }
      } catch (e) {
        console.error('Error accessing localStorage:', e);
      }
    }
  }

  navigateToHome() {
    // Navigasi ke halaman beranda
    window.location.href = window.location.origin + '/home';
  }

  navigateToOrders() {
    // Navigasi ke halaman pesanan
    window.location.href = window.location.origin + '/orders';
  }
}
