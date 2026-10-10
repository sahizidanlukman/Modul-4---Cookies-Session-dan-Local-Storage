<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id_barang' => 'PRD001',
                'nama_barang' => 'Laptop Asus Vivobook',
                'deskripsi' => 'Laptop cocok untuk kuliah dan tugas akhir.',
                'harga' => 8500000.00,
                'stok' => 5,
                'gambar' => 'laptop.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD002',
                'nama_barang' => 'Mouse Wireless Logitech',
                'deskripsi' => 'Mouse ergonomic dengan koneksi wireless 2.4GHz.',
                'harga' => 150000.00,
                'stok' => 12,
                'gambar' => 'mouse.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD003',
                'nama_barang' => 'Keyboard Mechanical',
                'deskripsi' => 'Keyboard RGB switch biru responsif.',
                'harga' => 450000.00,
                'stok' => 8,
                'gambar' => 'keyboard.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD004',
                'nama_barang' => 'Monitor 24 Inch IPS',
                'deskripsi' => 'Monitor Full HD Refresh Rate 75Hz.',
                'harga' => 1800000.00,
                'stok' => 3,
                'gambar' => 'monitor.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD005',
                'nama_barang' => 'Headset Gaming',
                'deskripsi' => 'Headset suara surround 7.1 dengan mikrofon jernih.',
                'harga' => 350000.00,
                'stok' => 0, // Contoh stok 0 untuk pengujian
                'gambar' => 'headset.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD006',
                'nama_barang' => 'Flashdisk 64GB USB 3.0',
                'deskripsi' => 'Penyimpanan portabel transfer data cepat.',
                'harga' => 85000.00,
                'stok' => 20,
                'gambar' => 'flashdisk.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD007',
                'nama_barang' => 'Webcam Full HD 1080p',
                'deskripsi' => 'Kamera web autofocus untuk meeting online.',
                'harga' => 250000.00,
                'stok' => 7,
                'gambar' => 'webcam.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD008',
                'nama_barang' => 'External Harddisk 1TB',
                'deskripsi' => 'Harddisk eksternal kapasitas besar dan tahan banting.',
                'harga' => 720000.00,
                'stok' => 4,
                'gambar' => 'harddisk.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD009',
                'nama_barang' => 'Stand Laptop Alumunium',
                'deskripsi' => 'Stand pendingin laptop berbahan alumunium kokoh.',
                'harga' => 120000.00,
                'stok' => 15,
                'gambar' => 'stand.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_barang' => 'PRD10',
                'nama_barang' => 'Kabel HDMI 4K 2 Meter',
                'deskripsi' => 'Kabel serat berkualitas tinggi mendukung display 4K.',
                'harga' => 45000.00,
                'stok' => 25,
                'gambar' => 'hdmi.jpg',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}