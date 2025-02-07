Ramdhan Nassyirah <br>
Group 6 - 189 <br>

# 🛒 Kasirin Aja - POS System

Kasirian adalah sistem Point of Sale (POS) berbasis Laravel untuk membantu pengelolaan transaksi penjualan dengan mudah dan efisien.

## 🛠️ Teknologi yang Digunakan

- Laravel - Backend Framework
- MySQL - Database Management
- Bootstrap - UI Styling

## 🔥 Fitur Utama

- Manajemen produk & kategori
- Manajemen stok barang
- Transaksi penjualan & laporan
- Dukungan multi-user dengan role-based access

## 📂 Struktur Proyek

```
📦 kasirian
├── 📁 app
├── 📁 bootstrap
├── 📁 config
├── 📁 database
├── 📁 public
├── 📁 resources
│   ├── 📁 views
│   ├── 📁 css
│   ├── 📁 js
├── 📁 routes
├── 📁 storage
├── 📁 tests
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

## 🚀 Instalasi & Penggunaan

### 1️⃣ Clone Repository
```sh
git clone [https://github.com/your-username/kasirian.git](https://github.com/ramdhannassyirah/KasirinAja.git)
cd KasirinAja
```

### 2️⃣ Install Dependencies
```sh
composer install
npm install
```

### 3️⃣ Konfigurasi Database
1. Salin file `.env.example` menjadi `.env`
2. Atur konfigurasi database di `.env`
3. Jalankan migrasi database:
   ```sh
   php artisan migrate --seed
   ```

### 4️⃣ Menjalankan Aplikasi
```sh
php artisan serve
```
Akses aplikasi di `http://127.0.0.1:8000`

## 🔗 Deployment

Untuk deployment, gunakan layanan seperti:
- Laravel Forge
- DigitalOcean
- VPS dengan Nginx/Apache
- Heroku dengan database eksternal



💡 Kontribusi & feedback sangat diterima!

  


