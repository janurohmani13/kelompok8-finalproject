import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { CurrencyPipe } from '@angular/common';

@Component({
  selector: 'app-transaction-success',
  templateUrl: './transaction-success.page.html',
  styleUrls: ['./transaction-success.page.scss'],
  providers: [CurrencyPipe]  // Jangan lupa providers CurrencyPipe
})
export class TransactionSuccessPage implements OnInit {
  orderId: string | null = null;
  totalPrice: number | null = null;
  transactionDetails: any[] = [];
  status: string | null = null;

  constructor(
    private activatedRoute: ActivatedRoute,
    private http: HttpClient,
    private router: Router,
    private currencyPipe: CurrencyPipe // Pastikan CurrencyPipe diinject
  ) {}

  ngOnInit() {
    this.activatedRoute.queryParams.subscribe((params) => {
      this.orderId = params['order_id'] || 'N/A';
      this.status = params['transaction_status'] || 'Unknown';
    });

    if (this.orderId) {
      this.fetchTransactionDetails(this.orderId);
    }
  }

  fetchTransactionDetails(orderId: string) {
    this.http.get<any>(`https://trend3.shop/api/transaction/${orderId}`).subscribe(
      (data) => {
        this.totalPrice = data.total_price;
        this.transactionDetails = data.transaction_details;
      },
      (error) => {
        console.error('Error fetching transaction details', error);
      }
    );
  }

  printReceipt() {
    const printContents = document.getElementById('receipt');
    if (printContents) {
      const originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents.innerHTML;
      window.print();
      document.body.innerHTML = originalContents;
    } else {
      console.error('Receipt element not found.');
    }
  }

  goHome() {
    this.router.navigate(['/home']);
  }
}
