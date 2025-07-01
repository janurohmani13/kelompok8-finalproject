import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-kurir-detail',
  templateUrl: './kurir-detail.page.html',
  styleUrls: ['./kurir-detail.page.scss'],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class KurirDetailPage {
  paket = {
    receiverName: 'Nama Penerima',
    address: 'Alamat Lengkap Penerima',
    name: 'Nama Paket',
    lat: -6.200000,
    lng: 106.816666
  };

  sudahSampai = false;

  constructor() { }

  bukaNavigasi(address: string) {
    // Fungsi membuka aplikasi navigasi, contohnya Google Maps
    // Contoh: window.open(`https://maps.google.com/?q=${encodeURIComponent(address)}`, '_blank');
    console.log('Navigasi ke:', address);
  }

  sampaiTitik() {
    this.sudahSampai = true;
  }

  updateStatusDikirim() {
    // Update status paket diterima, misal panggil API atau logic tertentu
    console.log('Status paket diterima diperbarui');
  }
}
