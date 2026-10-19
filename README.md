# Konsulin

Website layanan pajak, akuntansi, konsultasi bisnis, dan pendampingan. Dibangun dengan Laravel 13, Inertia 3, React 19, TypeScript, Vite, dan Motion.

## Menjalankan lokal

Kebutuhan: PHP 8.4+, Composer, Node.js 22.12+ (atau Node 24), ekstensi SQLite.

```sh
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
npm ci
npm run build
php artisan serve --host=127.0.0.1 --port=8073
```

Buka http://127.0.0.1:8073. Untuk pengembangan frontend, jalankan `npm run dev` pada terminal terpisah. Script memakai `vite.config.ts`. `vite.config.js` dan berkas welcome bawaan scaffold tidak digunakan oleh halaman baru.

## Fitur

- Beranda berbahasa Indonesia: hero, pilihan layanan interaktif, profil pendekatan, alur kerja, FAQ, formulir konsultasi.
- Navigasi mobile, keyboard tabs dengan Arrow/Home/End, Escape untuk menu, skip link, indikator fokus.
- Reveal satu kali, transisi layanan, dan dukungan `prefers-reduced-motion` tanpa scroll hijacking.
- Font Poppins disimpan lokal melalui Fontsource dan digunakan secara global.
- Halaman `/privasi` menjelaskan data yang dicatat oleh formulir.
- POST `/konsultasi`: validasi server, persetujuan, honeypot, CSRF, serta pembatasan 5 permintaan per menit per alamat IP.

## Permintaan konsultasi

Permintaan disimpan di tabel `consultation_requests`. **Notifikasi email dan WhatsApp belum diaktifkan** karena alamat tujuan belum diberikan. Konfirmasi UI hanya menyatakan penyimpanan berhasil. Tidak ada route publik untuk melihat permintaan.

Untuk memeriksa permintaan pada lingkungan lokal yang dikelola sendiri:

```sh
php artisan tinker
```

```php
DB::table('consultation_requests')->latest()->limit(20)->get();
```

Jangan menyalin hasil yang mengandung data pribadi ke log publik. Integrasi notifikasi dan panel pengelolaan dapat ditambahkan setelah alamat tujuan serta kebutuhan akses ditentukan.

## Mengubah konten dan desain

- `config/konsulin.php`: pilihan layanan beserta ruang lingkupnya.
- `resources/js/Pages/Home.tsx`: komposisi dan copy halaman utama.
- `resources/js/Components/ConsultationForm.tsx`: formulir dan feedback.
- `resources/js/Pages/Privacy.tsx`: penjelasan penggunaan data sesuai perilaku aplikasi.
- `tokens.css`: token warna, font, ruang, radius, dan timing.
- `resources/css/app.css`: layout dan responsive rules.

Warna brand `#0096c7` dan `#14213d` didefinisikan sebagai ekuivalen OKLCH di token. Warna teks biru kecil memakai varian lebih gelap untuk keterbacaan. Tidak ada statistik, testimoni, sertifikasi, atau logo klien rekaan.

## Verifikasi

```sh
php artisan test --compact
vendor/bin/pint --test
npm run build
```

Browser QA memakai Playwright dengan Chrome lokal (Browser plugin tidak tersedia). Layout diperiksa pada 320, 375, 414, 768, 1024, dan 1440 px. Interaksi yang diperiksa: pilihan layanan via klik/keyboard, pengisian layanan ke formulir, penyimpanan dan reset formulir, FAQ, menu mobile, Escape/fokus, reduced motion, halaman privasi, serta error jaringan dan rate limit. Screenshot dan script QA sementara disimpan di luar repository.

## Referensi dan aset

Struktur layanan mengambil inspirasi dari https://jhontax.co, dengan komposisi, identitas, dan copy Konsulin sendiri. Tidak mengambil profil, klaim, kontak, atau testimoni JhonTax.

Foto arsitektur dan ruang kerja bersumber dari Unsplash; keduanya ilustrasi konteks bisnis, bukan dokumentasi kantor atau tim Konsulin:

- https://images.unsplash.com/photo-1486406146926-c627a92ad1ab
- https://images.unsplash.com/photo-1497366754035-f200968a6e72

## Deployment

Arahkan document root server ke `public/`. Konfigurasikan database, domain HTTPS, `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` sesuai domain, dan cookie aman. Jalankan migrasi, build aset, serta `php artisan optimize`. Kredensial `.env`, database SQLite, `vendor/`, dan `node_modules/` tidak disimpan di Git. Formulir memerlukan prosedur internal penanganan permintaan sebelum digunakan sebagai saluran konsultasi operasional.
