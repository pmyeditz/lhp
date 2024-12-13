Berikut adalah tutorial langkah-langkah yang lebih sederhana untuk **Git clone**, konfigurasi database, dan penggunaan **maatwebsite/excel** di Laravel dengan MAMP dan XAMPP:

---

### **Langkah-langkah Git Clone dan Pengaturan Proyek Laravel**

#### 1. **Clone Repository dari GitHub**
Buka terminal atau command prompt, lalu jalankan perintah berikut untuk meng-clone repository:

```bash
git clone https://github.com/pmyeditz/lhp.git
cd lhp
```

#### 2. **Salin File `.env` dan Generate Key Aplikasi**
Setelah berada di dalam direktori proyek, salin file `.env.example` menjadi `.env` dan buat key aplikasi Laravel:

```bash
cp .env.example .env
php artisan key:generate
```

#### 3. **Konfigurasi Database**

##### **A. Jika Menggunakan MAMP**
Buka file `.env` dan sesuaikan konfigurasi database untuk MAMP:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lhp_produksi
DB_USERNAME="root"
DB_PASSWORD="root"
UNIX_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
```

##### **B. Jika Menggunakan XAMPP**
Buka file `.env` dan sesuaikan konfigurasi database untuk XAMPP:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lhp_produksi
DB_USERNAME="root"
DB_PASSWORD=""
DB_SOCKET=
```

#### 4. **Instalasi Dependensi dengan Composer**
Setelah konfigurasi database selesai, instal semua dependensi proyek dengan perintah berikut:

```bash
composer install
```

#### 5. **Menjalankan Migration dan Seeding**
Untuk membuat tabel dan mengisi data awal, jalankan migration dan seeding dengan perintah:

```bash
php artisan migrate --seed
```

#### 6. **Instalasi Paket maatwebsite/excel**
Jika Anda perlu menggunakan paket **maatwebsite/excel** untuk pengolahan file Excel, jalankan perintah berikut:

```bash
composer require maatwebsite/excel
```

#### 7. **Menjalankan Aplikasi Laravel**
Jalankan server Laravel dengan perintah berikut:

```bash
php artisan serve
```

Aplikasi Laravel akan dapat diakses di **http://localhost:8000**.

#### 8. **Akun Pengguna**
Akun yang sudah disediakan untuk login ke aplikasi:
- **Username:** admin, **Password:** 123
- **Username:** admin1, **Password:** 123

---
