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
            'nama' => 'Produk',
            'harga' => 20000,
            'deskripsi' => 'Adnjjhusda csaff',
            'gambar' => '6572373761.png',
            'berat' => 200,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'Sandal',
            'harga' => 15000,
            'deskripsi' => 'Sandal qwkwopoidhud',
            'gambar' => '2083669181sandal mendong.jpg',
            'berat' => 150,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'asdfgh',
            'harga' => 20000,
            'deskripsi' => 'sdfgrewerw',
            'gambar' => '1927142266mendong topi 2.jpg',
            'berat' => 200,
            'stok' => 2
        ]);
    }
}
