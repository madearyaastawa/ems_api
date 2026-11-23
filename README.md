# Backend Development Documentation

Dokumentasi proses pengembangan backend menggunakan Laravel, mulai dari persiapan tools, instalasi framework, konfigurasi database, hingga implementasi REST API dengan Laravel Sanctum.

## 1. Tools & Technologies

Tools yang digunakan dalam pengembangan proyek:

| Tools    | Version            |
| -------- | ------------------ |
| PHP      | `8.5.12`           |
| Composer | `2.10.3`           |
| MySQL    | `8.0.40`           |
| Node.js  | `v24.22.1`         |
| NPM      | `11.19.1`          |
| Git      | `2.56.0.windows.2` |
| Laravel  | `13.43.0`          |

## 2. Backend Development

### 2.1 Laravel Installation

Install Laravel versi 13.43.0 menggunakan Composer.

**Command:**

```bash
composer create-project laravel/laravel ems_api "13.43.0"
```

### 2.2 Database Creation

Membuat database MySQL yang digunakan oleh aplikasi.

**Database Configuration:**

- Database Name: `ems`
- Database Driver: `MySQL`

**Command:**

```
DROP SCHEMA `ems`;
CREATE SCHEMA `ems`;
USE `ems`;

CREATE USER 'user_ems'@'localhost' IDENTIFIED BY 'password_ems';
GRANT ALL PRIVILEGES ON `ems`.\* TO 'user_ems'@'localhost';
FLUSH PRIVILEGES;
```

### 2.3 Git Initialization

Menginisialisasi Git sebagai version control untuk mengelola perubahan kode.

**Command:**

```bash
git init
git add .
git commit -m "Initial commit"
```

### 2.4 Environment Configuration

Menyesuaikan file `.env` untuk menghubungkan aplikasi Laravel dengan database.

**Configuration:**

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ems
DB_USERNAME=user_ems
DB_PASSWORD=password_ems
```

### 2.5 Database Migration

Menjalankan migration untuk membuat tabel berdasarkan struktur database yang telah didefinisikan pada migration files.

**Command:**

```bash
php artisan make:migration roles
php artisan make:migration events
php artisan make:migration registrations
php artisan make:migration tickets
php artisan make:migration attendances
php artisan migrate
```

### 2.6 Database Seeding

Mengisi database dengan data awal menggunakan Laravel Seeder.

**Command:**

```bash
php artisan make:seeder CategorySeeder
php artisan make:seeder EventSeeder
php artisan make:seeder RoleSeeder
php artisan make:seeder UserSeeder
php artisan db:seed
```

### 2.7 Model Design

Membuat Eloquent Models untuk merepresentasikan tabel database dan mengelola relasi antar tabel.

**Command:**

```bash
php artisan make:model Attendance
php artisan make:model Category
php artisan make:model Event
php artisan make:model Registration
php artisan make:model Role
php artisan make:model Ticket
php artisan make:model User
```

### 2.8 API & Laravel Sanctum Installation

Menginstal Laravel Sanctum untuk menyediakan autentikasi berbasis API token.

**Command:**

```bash
php artisan install:api
```

### 2.9 Controllers & API Development

Membuat controller untuk menangani request dan response API serta mengelola operasi CRUD.

**Command:**

```bash
php artisan make:controller UserController
php artisan make:controller AuthController
php artisan make:controller CategoryController
php artisan make:controller EventController
php artisan make:controller RegistrationController
php artisan make:controller TicketController
php artisan make:controller AttendanceController
```

Mendaftarkan API resource routes pada `routes/api.php`.

## 3. API Testing

Melakukan pengujian endpoint API menggunakan Postman.

## 4. Project Execution

Menjalankan development server Laravel.

**Command:**

```bash
php artisan serve
```

Default local URL:

```text
http://127.0.0.1:8000
```

---

## 5. Development Progress

| No. | Development Stage             | Status      |
| --- | ----------------------------- | ----------- |
| 1   | Tools Installation            | Completed   |
| 2   | Laravel Installation          | Completed   |
| 3   | Database Creation             | Completed   |
| 4   | Git Initialization            | Completed   |
| 5   | Environment Configuration     | Completed   |
| 6   | Database Migration            | Completed   |
| 7   | Database Seeding              | Completed   |
| 8   | Model Design                  | Completed   |
| 9   | API & Sanctum Installation    | Completed   |
| 10  | Controllers & API Development | In Progress |
| 11  | API Testing                   | Pending     |

## 6. Notes

Dokumentasi ini mencatat tahapan pengembangan backend secara berurutan.
