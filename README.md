## About 

- Framework : Laravel10
- PHP VERSION : ^8.1
- Database : mySql

##  username-password
- Login as role ( admin ) : username => John@gmail.com, password => password
- Login as role ( headOffice ) : username => Johnoffice@gmail.com, password => password
- Login as role ( headMine ) : username => Johnmine@gmail.com, password => password

## Alur penggunaan aplikasi
1. login sebagai admin untuk menambahkan data kendaraan
2. login sebagai admin untuk menambahkan data pengemudi
3. login sebagai admin untuk menambahkan bookingKendaraan
4. login sebagai headOffice untuk melakukan persetujuan
5. login sebagai headMine untuk melakukan persetujuan
6. reports laporan dapat diakses untuk seluruh role user

## instalasi aplikasi
1. Clone repositori ini ke direktori lokal Anda.
2. Salin berkas .env.example menjadi .env dan atur konfigurasi database.
3. Jalankan perintah composer install untuk menginstal dependensi.
4. Jalankan perintah php artisan key:generate untuk menghasilkan kunci aplikasi.
5. Jalankan migrasi database dengan perintah php artisan migrate.
6. Jalankan server dengan perintah php artisan serve.
7. jalankan perintah php artisan db:seed untuk melakukan seeding data user.


