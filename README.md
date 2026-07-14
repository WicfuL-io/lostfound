# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library




# 🎒 Lost & Found Kampus

Sistem informasi **Lost & Found Kampus** berbasis **CodeIgniter 4** yang memudahkan mahasiswa melaporkan barang hilang, barang ditemukan, serta melakukan klaim kepemilikan barang.

---

## ✨ Fitur

- 🔐 Login & Register
- 👤 Manajemen Profil
- 📦 Lapor Barang Hilang
- 📦 Lapor Barang Ditemukan
- 🖼 Upload Foto Barang
- 📂 Kategori Barang
- 🔍 Pencarian & Filter Barang
- 📱 Hubungi Pelapor via WhatsApp
- 📩 Notifikasi
- 🤝 Klaim Kepemilikan Barang
- ✅ Verifikasi Klaim
- 👨‍💼 Dashboard Admin
- 📊 Statistik Barang

---

# 📋 Persyaratan

Pastikan komputer sudah terinstall:

- PHP 8.1 atau lebih baru
- Composer
- MySQL / MariaDB
- XAMPP / Laragon
- Git

Cek versi:

```bash
php -v
composer -V
git --version
```

---

# 📥 Clone Repository

```bash
git clone https://github.com/USERNAME/NAMA_REPOSITORY.git
```

Masuk ke folder project

```bash
cd NAMA_REPOSITORY
```

---

# 📦 Install Dependency

Install semua package Composer.

```bash
composer install
```

Tunggu hingga proses selesai.

---

# ⚙️ Konfigurasi Environment

Salin file:

```text
env
```

menjadi

```text
.env
```

atau gunakan:

```bash
cp env .env
```

Jika menggunakan Windows:

```bash
copy env .env
```

---

# 🗄 Konfigurasi Database

Buka file

```text
.env
```

Ubah bagian berikut sesuai database Anda.

```ini
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = lostfound
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

---

# 📁 Buat Database

Masuk ke phpMyAdmin kemudian buat database baru.

Nama database:

```text
lostfound
```

---

# 🚀 Jalankan Migration

```bash
php spark migrate
```

Jika berhasil akan muncul:

```text
Running all new migrations...
Done.
```

---

# 🌱 Jalankan Seeder (Jika Ada)

Jika project menggunakan seeder.

Lihat daftar seeder:

```bash
php spark
```

Jalankan:

```bash
php spark db:seed NamaSeeder
```

Contoh:

```bash
php spark db:seed UserSeeder
```

---

# 📂 Folder Upload

Pastikan folder berikut sudah tersedia.

```
public/
└── uploads/
    ├── barang/
    ├── claim/
    ├── profile/
    └── qr/
```

Jika belum ada, buat secara manual.

---

# 🔑 Beri Permission Folder

Linux / Mac

```bash
chmod -R 775 writable
chmod -R 775 public/uploads
```

Windows (XAMPP)

Pastikan folder dapat ditulis (Writable).

---

# ▶ Menjalankan Project

Menggunakan server bawaan CodeIgniter.

```bash
php spark serve
```

Akses melalui browser.

```
http://localhost:8080
```

Atau jika menggunakan XAMPP.

```
http://localhost/lostfound/public
```

---

# 👤 Akun Default (Opsional)

Jika menggunakan Seeder.

### Admin

```
Email    : admin@kampus.ac.id
Password : password
```

### Mahasiswa

```
Email    : mahasiswa@kampus.ac.id
Password : password
```

---

# 📂 Struktur Folder

```
app/
├── Controllers/
├── Models/
├── Views/
├── Database/
│   ├── Migrations/
│   └── Seeds/

public/
├── uploads/
│   ├── barang/
│   ├── claim/
│   ├── profile/
│   └── qr/

writable/
```

---

# 🛠 Teknologi

- CodeIgniter 4
- PHP 8+
- MySQL
- Bootstrap 5
- Composer
- JavaScript
- HTML5
- CSS3

---

# 📸 Screenshot

Tambahkan screenshot aplikasi pada folder:

```
docs/
```

Contoh:

```
docs/
├── dashboard.png
├── login.png
├── barang.png
├── detail.png
```

Kemudian tampilkan:

```md
## Login

![Login](docs/login.png)

## Dashboard

![Dashboard](docs/dashboard.png)
```

---

# 🤝 Kontribusi

1. Fork repository.
2. Buat branch baru.

```bash
git checkout -b fitur-baru
```

3. Commit perubahan.

```bash
git commit -m "Menambahkan fitur baru"
```

4. Push.

```bash
git push origin fitur-baru
```

5. Buat Pull Request.

---

# 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan pengembangan sistem Lost & Found Kampus.

Silakan digunakan dan dikembangkan sesuai kebutuhan.