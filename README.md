# E-Commerce REST API 

Sebuah RESTful API murni yang dibangun untuk mengelola data produk e-commerce, dilengkapi dengan sistem autentikasi token yang aman.

## Teknologi yang Digunakan
* **Framework:** Laravel 11 (PHP)
* **Database:** MariaDB
* **Autentikasi:** Laravel Sanctum

## Fitur Utama
* **Sistem Autentikasi:** Registrasi pengguna dan login untuk mendapatkan Access Token.
* **Keamanan Endpoint:** Operasi manipulasi data (POST, PUT, DELETE) dilindungi oleh *middleware* Sanctum.
* **CRUD Produk:** Manajemen data produk secara penuh.

## Dokumentasi Endpoint API

### 1. Autentikasi Publik
| Method | Endpoint | Deskripsi | Body (JSON) |
|--------|----------|-----------|-------------|
| POST   | `/api/register` | Mendaftarkan user baru | `name`, `email`, `password` |
| POST   | `/api/login` | Login & dapatkan token | `email`, `password` |

### 2. Manajemen Produk (Products)
*Catatan: Endpoint dengan tanda 🔒 wajib menyertakan header `Authorization: Bearer <token>` dan `Accept: application/json`.*

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| GET    | `/api/products` | Melihat daftar semua produk | Bebas |
| POST   | `/api/products` | Menambahkan produk baru | 🔒 |
| PUT    | `/api/products/{id}` | Mengubah data produk yang ada | 🔒 |
| DELETE | `/api/products/{id}` | Menghapus produk dari sistem | 🔒 |

## Cara Menjalankan Proyek Secara Lokal

1. Clone repositori ini:
   ```bash
   git clone [https://github.com/username-kamu/ecommerce-api.git](https://github.com/username-kamu/ecommerce-api.git)
