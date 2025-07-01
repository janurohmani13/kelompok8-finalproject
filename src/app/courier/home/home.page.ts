import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule, MenuController, ActionSheetController } from '@ionic/angular';
import { ProductService, Product } from 'src/app/services/product.service';
import { CartService } from 'src/app/services/cart.service';
import { AuthService } from 'src/app/services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule],
})
export class HomePage implements OnInit {
  searchQuery = '';
  searchActive = false;
  searchHistory: string[] = [];
  products: Product[] = [];
  cart: Product[] = [];
  wishlist: Product[] = [];
  segment = 'new-drops';
  suggested: Product[] = [];
  selectedPackage: string | null = null;  // This will track the selected package
  


  user: any;
  address: any = null;
  paymentStatus: string = 'unpaid'; // Default to unpaid

  constructor(
    private menuCtrl: MenuController,
    private router: Router,
    private productService: ProductService,
    private authService: AuthService,
    private cartService: CartService,
    private http: HttpClient,
    private actionSheetController: ActionSheetController
    
    
  ) {}

  ngOnInit() {
    this.loadCartItems();
    this.loadWishlist();
    this.loadSearchHistory();
    this.loadProducts();
    this.user = this.authService.getUser(); // Get user data
    this.loadAddress();
    this.loadPaymentStatus();
  }

  // Method to handle selecting a package
  selectPackage(packageType: string) {
    this.selectedPackage = packageType;
  }

  updateStatus() {
    if (this.selectedPackage) {
      // Navigate based on selected package type
      this.router.navigate([`/courier/${this.selectedPackage}`]);
    }
  }

  loadAddress() {
    const userId = this.user.id;
    this.http.get<any>(`/api/addresses/${userId}`).subscribe({
      next: (res) => {
        this.address = res; // Assuming the response contains address data
      },
      error: (err) => {
        console.error('Error fetching address:', err);
      },
    });
  }

  loadPaymentStatus() {
    const transactionId = this.cartService.getTransactionId(); // Get transaction ID from cart service
    this.http.get<any>(`/api/payments/status/${transactionId}`).subscribe({
      next: (res) => {
        this.paymentStatus = res.status; // Assuming the response contains the payment status
      },
      error: (err) => {
        console.error('Error fetching payment status:', err);
      },
    });
  }

  loadProducts() {
    this.productService.getProducts().subscribe({
      next: (res: Product[]) => {
        this.products = res;
        this.suggested = res.slice(0, 4);
      },
      error: (err) => {
        console.error('Error fetching products:', err);
      }
    });
  }

  loadCartItems() {
    this.cart = JSON.parse(localStorage.getItem('cart') || '[]');
  }

  loadWishlist() {
    this.wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
  }

  get filteredProducts(): Product[] {
    return this.products; // No filter for now
  }

  onSegmentChanged(event: any) {
    this.segment = event.detail.value;
  }

  viewProduct(id: number) {
    this.router.navigate(['/product-detail', id]);
  }

  addToCart(item: Product) {
    const cartData = {
      user_id: this.authService.getUser().id,
      product_id: item.id,
      quantity: 1,
    };
    this.cartService.addCartItem(cartData).subscribe({
      next: (res) => console.log('Item added to cart', res),
      error: (err) => console.error('Error adding item to cart', err),
    });
  }

  navigateTo(route: string) {
    this.router.navigate([route]);
    this.menuCtrl.close();
  }

  showSearchOverlay() {
    this.searchActive = true;
  }

  closeSearchOverlay() {
    this.searchActive = false;
    this.searchQuery = '';
  }

  onSearchInput(event: any) {
    const value = event.target.value?.trim();
    this.searchQuery = value;

    if (value && value.length > 1 && !this.searchHistory.includes(value)) {
      this.saveToSearchHistory(value);
    }
  }

  saveToSearchHistory(query: string) {
    let history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
    if (!history.includes(query)) {
      history.unshift(query);
      if (history.length > 10) history.pop();
      localStorage.setItem('searchHistory', JSON.stringify(history));
      this.searchHistory = history;
    }
  }

  async openUserMenu(event: any) {
    const actionSheet = await this.actionSheetController.create({
      header: 'User Options',
      buttons: [
        {
          text: 'Account Settings',
          icon: 'settings-outline',
          handler: () => {
            this.navigateToAccountSettings();
          },
        },
        {
          text: 'Logout',
          icon: 'log-out-outline',
          handler: () => {
            this.logout();
          },
        },
        {
          text: 'Cancel',
          role: 'cancel',
          icon: 'close',
        },
      ],
    });
    await actionSheet.present();
  }

  logout() {
    this.authService.logout().subscribe({
      next: () => {
        localStorage.removeItem('user');
        localStorage.removeItem('token');
        this.router.navigate(['/login']);
      },
      error: (err) => {
        console.error('Logout failed:', err);
      }
    });
  }

  navigateToAccountSettings() {
    this.router.navigate(['/account-settings']);
  }

  loadSearchHistory() {
    this.searchHistory = JSON.parse(localStorage.getItem('searchHistory') || '[]');
  }

  clearSearchHistory() {
    localStorage.removeItem('searchHistory');
    this.searchHistory = [];
  }

  removeFromHistory(term: string) {
    this.searchHistory = this.searchHistory.filter(t => t !== term);
    localStorage.setItem('searchHistory', JSON.stringify(this.searchHistory));
  }

  addToWishlist(item: Product) {
    if (!this.wishlist.find(p => p.id === item.id)) {
      this.wishlist.push(item);
    }
  }

  get showAddress(): boolean {
    return this.paymentStatus === 'paid'; // Show address only if payment is 'paid'
  }
}
