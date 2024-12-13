

Berikut adalah tutorial langkah-langkah untuk melakukan **Git clone**, serta pengaturan **database** menggunakan MAMP dan XAMPP dengan konfigurasi untuk menggunakan **maatwebsite/excel**.

---

### **Langkah-langkah Git Clone dan Konfigurasi Database**

#### 1. **Clone Repository dengan Git**

1. **Buka terminal** atau **command prompt**.
2. **Clone repository** dari GitHub dengan perintah berikut:
   ```bash
   git clone https://github.com/pmyeditz/lhp.git
   ```
   Gantilah URL dengan URL yang sesuai jika berbeda. Perintah ini akan men-download semua file dari repository GitHub ke komputer Anda.

#### 2. **Masuk ke Direktori Project**
Setelah berhasil melakukan clone, masuk ke direktori project:
```bash
cd lhp
```

#### 3. **Instalasi Dependensi dengan Composer**
Pastikan **Composer** sudah terinstall di komputer Anda. Jika belum, Anda dapat mengunduhnya dari [https://getcomposer.org](https://getcomposer.org).

Setelah itu, jalankan perintah berikut untuk menginstal dependensi project, termasuk **maatwebsite/excel**:
```bash
composer install
```

#### 4. **Konfigurasi Database (MAMP dan XAMPP)**

##### **A. Menggunakan MAMP**

Jika Anda menggunakan **MAMP**, ubah file `.env` yang ada di dalam project Anda. Cari bagian pengaturan **database** dan sesuaikan dengan konfigurasi berikut:

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

Penjelasan:
- **DB_HOST** adalah alamat server database, dalam hal ini `127.0.0.1` (localhost).
- **DB_PORT** adalah port yang digunakan oleh MySQL (standarnya 3306).
- **DB_DATABASE** adalah nama database yang akan digunakan, pastikan Anda sudah membuatnya di MAMP.
- **DB_USERNAME** dan **DB_PASSWORD** adalah kredensial untuk login ke MySQL. Di MAMP defaultnya adalah `root` untuk keduanya.
- **UNIX_SOCKET** dan **DB_SOCKET** menunjukkan lokasi socket MySQL yang digunakan oleh MAMP.

##### **B. Menggunakan XAMPP**

Jika Anda menggunakan **XAMPP**, ubah file `.env` seperti berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lhp_produksi
DB_USERNAME="root"
DB_PASSWORD=""
DB_SOCKET=
```

Penjelasan:
- **DB_USERNAME** di XAMPP biasanya menggunakan `root` dan tanpa password, jadi kosongkan **DB_PASSWORD**.
- **DB_SOCKET** biasanya tidak diperlukan di XAMPP, jadi biarkan kosong.

#### 5. **Menjalankan Migration dan Seeding**

Setelah konfigurasi database selesai, jalankan **migration** dan **seeding** untuk membuat tabel-tabel di database. Jalankan perintah berikut:

```bash
php artisan migrate --seed
```

Perintah ini akan membuat tabel di database yang telah Anda tentukan di `.env` dan menambahkan data awal jika ada seeder yang disiapkan.

#### 6. **Menjalankan Aplikasi**

Setelah semua langkah di atas selesai, Anda dapat menjalankan server lokal untuk menguji aplikasi:

```bash
php artisan serve
```

Aplikasi akan dapat diakses di **http://localhost:8000**.

---

### **Menggunakan maatwebsite/excel**

1. **Instalasi paket maatwebsite/excel**:
Jika Anda belum menginstal **maatwebsite/excel**, jalankan perintah berikut untuk menambahkannya ke project Anda:
   ```bash
   composer require maatwebsite/excel
   ```

2. **Penggunaan dalam Project**:
   - **Membaca file Excel**:
     Di controller atau bagian lain aplikasi, Anda dapat menggunakan paket ini untuk membaca file Excel dengan cara berikut:
     ```php
     use Maatwebsite\Excel\Facades\Excel;
     use App\Imports\YourImport;

     Excel::import(new YourImport, 'yourfile.xlsx');
     ```
   
   - **Menulis ke file Excel**:
     Untuk menulis data ke file Excel, Anda dapat menggunakan:
     ```php
     use Maatwebsite\Excel\Facades\Excel;
     use App\Exports\YourExport;

     return Excel::download(new YourExport, 'yourfile.xlsx');
     ```

---







<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
