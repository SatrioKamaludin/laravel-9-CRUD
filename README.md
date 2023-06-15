Course exercise untuk mengenali dan memahami pengembangan aplikasi di Laravel 9, serta melakukan implementasi fullstack web app development dari pembuatan Database hingga aplikasi web.

## Prequisite
1. Microsoft VS Code
2. Node.js
3. XAMPP
4. Composer
5. Git (Jika ingin menggunakan metode clone repo ini selain zip)

## Instalasi

1. Install seluruh dependencies yang diperlukan dengan Composer
   <br>"composer install"

2. Copy file .env.example dan namakan file menjadi .env saja, kemudian edit file .env sebagai konfigurasi
    <br>"cp .env.example .env"

3. Generate key untuk aplikasi
    <br>"php artisan key:generate"

4. Buat database di phpmyadmin (pastikan  Apache dan MySQL di XAMPP sudah dijalankan) dengan nama database disamakan dengan value DB_DATABASE yang terletak didalam .env
   
5. Jalankan migrasi database dan lakukan seeding database (Pastikan database connection di file .env telah dikonfigurasikan)
    <br>"php artisan migrate --seed"

6. Buat Link symbolic dari public/storage ke storage/app/public agar file dapat diakses di web
    <br>"php artisan storage:link"

7. Jalankan
   "npm run dev" dan "php artisan serve" di terminal yang berbeda 
