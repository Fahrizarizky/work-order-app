🚀 Sistem Manajemen Work Order untuk Manufaktur.

Membuat aplikasi web untuk mengelola work order dalam proses manufaktur, termasuk pembuatan, pelacakan, dan pembaruan work order dengan role-based access control (RBAC).

<br>
📌 Prasyarat (Requirements)

Sebelum menginstal proyek ini, pastikan Anda sudah menginstal:

- Laragon (Disarankan untuk Windows)

- PHP (minimal versi 8.3)

- Composer (Dependency Manager untuk PHP)

- MySQL (Sudah termasuk dalam Laragon)

- Node.js & NPM (untuk frontend jika diperlukan)

<br>
🔥 Instalasi & Setup

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini:

1️⃣ Clone Repository

- Jalankan perintah berikut di terminal atau command prompt:

git clone https://github.com/username/repo-laravel.git
cd repo-laravel

- Ganti username/repo-laravel.git dengan URL repository proyek Anda.

2️⃣ Menjalankan Laragon

- Buka Laragon.

- Klik Start All untuk menjalankan Apache & MySQL.

3️⃣ Instal Dependensi Composer

- Jalankan perintah berikut untuk menginstal package Laravel:

"composer install"

4️⃣ Konfigurasi File .env

- Duplikat file .env.example dan ubah namanya menjadi .env:

cp .env.example .env

- Edit .env untuk mengatur koneksi database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

Note: Jika menggunakan Laragon, biasanya username adalah root dan password kosong.

5️⃣ Generate Application Key

- Jalankan perintah ini untuk membuat APP_KEY:

- php artisan key:generate

6️⃣ Migrasi Database

- Jalankan perintah berikut untuk membuat tabel di database:

"php artisan migrate"

- Untuk menjalankan seeder, jalankan:

"php artisan db:seed"

7️⃣ Jalankan Server Laravel

- Untuk menjalankan aplikasi, gunakan perintah berikut:

"php artisan serve"

- Aplikasi akan berjalan di:

http://127.0.0.1:8000

- Jika menggunakan Laragon, cukup klik "www" di Laragon untuk melihat proyek.

<br>
❓ Troubleshooting

Jika mengalami error, coba langkah-langkah berikut:

- Cek file .env, pastikan database dikonfigurasi dengan benar.

- Hapus cache konfigurasi dengan menjalankan:

"php artisan config:clear"

"php artisan cache:clear"

"php artisan view:clear"

- Pastikan Laragon sudah berjalan dan MySQL aktif.

- Cek error log Laravel di storage/logs/laravel.log.

<br>
✨ Demo

Proyek ini sudah dideploy di Railway. Anda bisa mengaksesnya melalui link berikut:

<a href="https://work-order-app-production.up.railway.app/dashboard"> 🔗 Live Demo </a>

<br>
🔑 Akun Demo

Gunakan akun berikut untuk mencoba fitur login:

Manager Production :

✉️ Email: managerproduction@gmail.com

🔑 Password: password

Operator:

✉️ Email: operator1@gmail.com

🔑 Password: password

Catatan: Jika akun demo tidak bisa digunakan, silakan hubungi saya atau coba reset database.

<br>
✨ Kontributor

Jika ingin berkontribusi, lakukan Fork Repository, buat branch baru (feature-branch), dan lakukan Pull Request.
