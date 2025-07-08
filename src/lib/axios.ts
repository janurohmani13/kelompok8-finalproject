import axios from 'axios';
import { environment } from 'src/environments/environment';

// Tentukan base URL berdasarkan environment dan platform
let baseURL = environment.apiUrl;

// Jika aplikasi berjalan di perangkat mobile, gunakan full URL
if (document.URL.includes('ionic') || document.URL.includes('capacitor') || document.URL.includes('android')) {
	baseURL = environment.baseUrl + environment.apiUrl;
}

// Buat axios instance dengan konfigurasi yang benar
export const axiosInstance = axios.create({
	baseURL: baseURL,
	timeout: 30000, // 30 detik timeout
	headers: {
		'Content-Type': 'application/json',
		'Accept': 'application/json'
	}
});

// Interceptor untuk menangani error
axiosInstance.interceptors.response.use(
	(response) => response,
	(error) => {
		console.error('Axios Error:', error);
		return Promise.reject(error);
	}
);