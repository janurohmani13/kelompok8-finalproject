import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ProductService, Product } from 'src/app/services/product.service';
import { CartService } from 'src/app/services/cart.service';
import { AuthService } from 'src/app/services/auth.service';
import {
  IonContent,
  IonHeader,
  IonTitle,
  IonToolbar,
  IonButtons,
  IonBackButton,
  IonCard,
  IonCardHeader,
  IonCardTitle,
  IonCardSubtitle,
  IonCardContent,
  IonImg,
  IonButton,
  IonSpinner,
  ToastController
} from '@ionic/angular/standalone';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.page.html',
  styleUrls: ['./product-detail.page.scss'],
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    IonContent,
    IonHeader,
    IonTitle,
    IonToolbar,
    IonButtons,
    IonBackButton,
    IonCard,
    IonCardHeader,
    IonCardTitle,
    IonCardSubtitle,
    IonCardContent,
    IonImg,
    IonButton,
    IonSpinner
  ]
})
export class ProductDetailPage implements OnInit {
  product!: Product | undefined;
  isLoading: boolean = true;

  constructor(
    private route: ActivatedRoute,
    private productService: ProductService,
    private cartService: CartService,
    private authService: AuthService,
    private toastController: ToastController
  ) {}

  ngOnInit(): void {
    const id = Number(this.route.snapshot.paramMap.get('id'));

    if (!id) return;

    this.productService.getProducts().subscribe({
      next: (products) => {
        this.product = products.find((p) => p.id === id);
        this.isLoading = false;
      },
      error: (err) => {
        console.error('Gagal memuat produk:', err);
        this.isLoading = false;
      }
    });
  }

  async presentToast(message: string, color: string = 'success') {
    const toast = await this.toastController.create({
      message,
      duration: 2000,
      color,
      position: 'top'
    });
    toast.present();
  }

  addToCart(): void {
    if (!this.product) return;

    const user = this.authService.getUser();
    if (!user?.id) {
      console.error('User ID tidak ditemukan.');
      this.presentToast('User belum login.', 'danger');
      return;
    }

    console.log('Memulai request addCartItem');

    this.cartService.addCartItem({
      user_id: user.id,
      product_id: this.product.id,
      quantity: 1
    }).subscribe({
      next: (res) => {
        console.log('Berhasil ditambahkan ke keranjang', res);
        this.presentToast('Produk berhasil dimasukkan ke keranjang!', 'success');
      },
      error: (err) => {
        console.error('Gagal tambah ke keranjang:', err);
        this.presentToast('Gagal menambahkan ke keranjang.', 'danger');
      }
    });
  }

}
