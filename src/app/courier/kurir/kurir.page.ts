import { Component } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

export interface Paket {
  id: string;
  type: 'express' | 'reguler';
  name: string;
  address: string;
  status: 'belum-dikirim' | 'dikirim' | 'terkirim';
  lat: number;  // contoh koordinat titik tujuan
  lng: number;
}

@Component({
  selector: 'app-kurir',
  templateUrl: './kurir.page.html',
  styleUrls: ['./kurir.page.scss'],
  standalone: true,
  imports: [CommonModule, FormsModule, IonicModule]
})
export class KurirPage {
  tab: 'belum' | 'dikirim' | 'terkirim' = 'belum';

  paketList: Paket[] = [
    {id: '1', type: 'express', name: 'James Drown', address: 'Jl. KH. Mas Mansyur No.75', status: 'belum-dikirim', lat: -7.78, lng: 110.37},
    {id: '2', type: 'express', name: 'Camel Rine', address: 'Jl. Marina Raya No.6', status: 'belum-dikirim', lat: -7.79, lng: 110.38},
    {id: '3', type: 'reguler', name: 'Lucky', address: 'Jl. Kamal Raya No. 8', status: 'belum-dikirim', lat: -7.80, lng: 110.39},
    {id: '4', type: 'reguler', name: 'Ryan', address: 'Jl. Kebon Jeruk III No.1', status: 'belum-dikirim', lat: -7.81, lng: 110.40}
  ];

  selectedPaketId: string | null = null;

  constructor(private router: Router) {}

  get filteredPaketList() {
    if (this.tab === 'belum') {
      return this.paketList.filter(p => p.status === 'belum-dikirim');
    } else if (this.tab === 'dikirim') {
      return this.paketList.filter(p => p.status === 'dikirim');
    } else {
      return this.paketList.filter(p => p.status === 'terkirim');
    }
  }

  selectPaket(id: string) {
    this.selectedPaketId = id;
  }

  updateStatus() {
    if (!this.selectedPaketId) return;
    const paket = this.paketList.find(p => p.id === this.selectedPaketId);
    if (!paket) return;

    // Ubah status dari 'belum-dikirim' ke 'dikirim'
    if (paket.status === 'belum-dikirim') {
      paket.status = 'dikirim';
      this.selectedPaketId = null;
      this.tab = 'dikirim';
    }
  }

  // Navigasi ke detail paket
  goToDetail(paket: Paket) {
    // Kirim id paket via routing state atau params
    this.router.navigate(['/kurir-detail'], { state: { paket } });
  }
}
