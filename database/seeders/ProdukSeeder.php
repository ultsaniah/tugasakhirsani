<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama' => 'Sandal',
            'harga' => 15000,
            'deskripsi' => 'Sandal berbahan dasar medong',
            'gambar' => '2083669181sandal mendong.jpg',
            'berat' => 150,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'Topi',
            'harga' => 20000,
            'deskripsi' => 'Topi yang berbahan dasar mendong',
            'gambar' => '1927142266mendong topi 2.jpg',
            'berat' => 200,
            'stok' => 2
        ]);
        Produk::create([
            'nama' => ' Dompet Panjang',
            'harga' => 20000,
            'deskripsi' => 'Dompet wanita panjang berukuran 25 Cm yang terbuat dari bahan dasar mendong berkualitas. Ada berbagai jenis warna, simple dan elegan',
            'gambar' => '1.png',
            'berat' => 100,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => ' Dompet Kecil',
            'harga' => 16000,
            'deskripsi' => 'Dompet kecil berukuran 20 Cm, hanya ada pilihan satu model cocok untuk tempat koin atau uang receh.',
            'gambar' => '2.png',
            'berat' => 100,
            'stok' => 7
        ]);
        Produk::create([
            'nama' => 'Souvenir Box Kecil',
            'harga' => 15000,
            'deskripsi' => 'Kotak souvenir berukuran 15 Cm berbahan dasar mendong. Bisa untuk tempat aksesoris atau tempat apapun.',
            'gambar' => '3.png',
            'berat' => 90,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Sajadah',
            'harga' => 40000,
            'deskripsi' => 'Sajadah berbahan dasar mendong dengan ukuran 67x118 cm, praktis dan mudah dilipat.',
            'gambar' => '4.png',
            'berat' => 120,
            'stok' => 20
        ]);
        Produk::create([
            'nama' => 'Kotak Tisu',
            'harga' => 40000,
            'deskripsi' => 'Kotak tisu berukuran 22x14x12 cm, berbahan dasar mendong sangat kokoh dan elegan.',
            'gambar' => '5.png',
            'berat' => 150,
            'stok' => 15
        ]);
    }
}
