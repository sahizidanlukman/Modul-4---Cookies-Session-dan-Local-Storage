<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
    ['nama' => 'Buku Tulis', 'harga' => 5000, 'stok' => 50, 'gambar' => 'buku-tulis.jpeg'],
    ['nama' => 'Pulpen',     'harga' => 3000, 'stok' => 50, 'gambar' => 'pulpen.jpg'],
    ['nama' => 'Penggaris',  'harga' => 4000, 'stok' => 50, 'gambar' => 'penggaris.jpg'],
    ['nama' => 'Pensil 2B',  'harga' => 2500, 'stok' => 50, 'gambar' => 'pensil-2b.png'],
    ['nama' => 'Penghapus',  'harga' => 1500, 'stok' => 50, 'gambar' => 'penghapus.jpg'],
];

        foreach ($data as $item) {
            Barang::create($item);
        }
    }
}