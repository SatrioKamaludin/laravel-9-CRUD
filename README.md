Course exercise untuk mengenali dan memahami pengembangan aplikasi di Laravel 9, serta melakukan implementasi fullstack web app development dari pembuatan Database hingga aplikasi web.

## Instalasi

1. Install seluruh dependencies yang diperlukan dengan Composer
   "composer install"

2. Copy file .env.example dan namakan file menjadi .env saja, kemudian edit file .env sebagai konfigurasi
   "cp .env.example .env"

3. Generate key untuk aplikasi
   "php artisan key:generate"
   
4. Jalankan migrasi database dan lakukan seeding database (Pastikan database connection di file .env telah dikonfigurasikan)
   "php artisan migrate --seed"

5. Buat Link symbolic dari public/storage ke storage/app/public agar file dapat diakses di web
   "php artisan storage:link"

6. Jalankan
   "npm run dev" dan "php artisan serve" di terminal yang berbeda 
