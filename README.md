<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
  </a>
</p>

# 🎥 Demo Video

<p align="center">
  <a href="https://youtu.be/e9jf22Ebjss" target="_blank">
    <img src="https://img.youtube.com/vi/e9jf22Ebjss/0.jpg" alt="Demo Video" width="600">
  </a>
</p>

---

# MUC Mini Project 2025

Mini Project Test Assignment untuk posisi **Junior Programmer** di MUC Consulting.  
Dibangun dengan **Laravel Modular Structure** dan multi-database integration.

---

## 📂 Modul yang Dikembangkan
- **Employees** → Manajemen data karyawan (bonus: edit status).
- **Proposal** → Create proposal (mandatory).
- **Serviceused** → List service dengan Proposal Number, Nama Service, Status (badge warna), Timespent.
- **Timesheet** → List timesheet dengan Tanggal, Karyawan, Proposal Number, Service Name, Waktu Mulai/Selesai, Total Jam.

---

## ⚙️ Setup Project

1. **Clone repository**
   ```bash
   git clone https://github.com/Asa270201/muc_miniproject2025.git
   cd muc_miniproject2025
   
2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev

3. **File .env tersedia di folder**
   ```code
   database/schema/.env

4. **Untuk Menjalankan lokal, salin ke root project**
   ```bash
   cp database/schema/.env .env

5. **Generate Key**
   ```bash
   php artisan key:generate

6. **Import Database ke phpMyAdmin*
   Buka phpMyAdmin melalui browser (biasanya http://localhost/phpmyadmin).
   Pilih database sesuai konfigurasi di file .env (misalnya muc__marketing__miniproject,
   muc__activity__miniproject, dll).
   Klik tab Import.
   Klik Choose File dan pilih file SQL yang ada di folder:
   ```code
   database/schema/
  Klik Go untuk menjalankan import.
  Ulangi langkah ini untuk setiap schema database yang digunakan project.

7. **Jalankan server**
   ```bash
   php artisan serve


---

Author
Akbar Pratama Fullstack Web Developer & Data Analyst




