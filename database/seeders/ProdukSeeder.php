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
        Produk::create([
            'nama' => 'Alas Sedang',
            'harga' => 50000,
            'deskripsi' => 'Alas sedang dengan diameter 15 cm terbuat dari bahan mendong berkualitas. Bisa untuk alas apapun.',
            'gambar' => '6.png',
            'berat' => 100,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'Alas Kecil',
            'harga' => 20000,
            'deskripsi' => 'Alas kecil dengan diameter 8 cm terbuat dari bahan mendong berkualitas. Bisa untuk alas mangkuk, gelas ataupun pot kecil.',
            'gambar' => '7.png',
            'berat' => 85,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Karpet Bundar',
            'harga' => 210000,
            'deskripsi' => 'Karpet berbahan dasar mendong dengan diameter 86cm, tebal dan berkualitas.',
            'gambar' => '8.png',
            'berat' => 300,
            'stok' => 3
        ]);
        Produk::create([
            'nama' => 'Karpet Panjang',
            'harga' => 100000,
            'deskripsi' => 'Karpet mendong dengan panjang 94cmx42cm, tebal dan berkualitas.',
            'gambar' => '9.png',
            'berat' => 175,
            'stok' => 2
        ]);
        Produk::create([
            'nama' => 'Dompet STNK',
            'harga' => 10000,
            'deskripsi' => 'Dompet STNK berbahan dasar mendong dengan ukuran 10x5cm dengan pilihan 2 warna, bisa untuk tempat STNK, KTP atau kartu-kartu lainnya.',
            'gambar' => '10.png',
            'berat' => 25,
            'stok' => 15
        ]);
        Produk::create([
            'nama' => 'Kursi Stull Kuda',
            'harga' => 225000,
            'deskripsi' => 'Kursi dengan ukuran 30 Cm yang dudukannya terbuat dari full mendong dan terdiri dari 4 kaki kursi yang berbahan dasar kayu. Bisa diletakkan di teras maupun tempat duduk santai.',
            'gambar' => '11.png',
            'berat' => 500,
            'stok' => 9
        ]);
        Produk::create([
            'nama' => 'Kursi Stull Mendong',
            'harga' => 260000,
            'deskripsi' => 'Kursi dengan diameter 40 Cm yang dudukannya terbuat dari full mendong dan terdiri dari 4 kaki kursi yang berbahan dasar kayu. Bisa diletakkan di teras maupun tempat duduk santai.',
            'gambar' => '12.png',
            'berat' => 800,
            'stok' => 6
        ]);
        Produk::create([
            'nama' => 'Tas Wanita',
            'harga' => 25000,
            'deskripsi' => 'Tas wanita berukuran 30x12x12, berbahan dasar mendong dengan kualitas tinggi melengkapi penampilan yang semakin sempurna, baik dalam acara formal maupun non formal.',
            'gambar' => '13.png',
            'berat' => 25,
            'stok' => 12
        ]);
        Produk::create([
            'nama' => 'Sandal Hotel Batik Mendong',
            'harga' => 15000,
            'deskripsi' => 'Cocok digunakan saat musim hujan maupun musim dingin. Nyaman digunakan, sehingga memberikan kemudahan saat melangkah.',
            'gambar' => '14.png',
            'berat' => 20,
            'stok' => 20
        ]);
        Produk::create([
            'nama' => 'Amplop Undangan Mendong',
            'harga' => 5000,
            'deskripsi' => 'Amplop ukuran 23x11 Cm yang dibuat dengan bahan dasar mendong berkualitas tinggi.',
            'gambar' => '15.png',
            'berat' => 20,
            'stok' => 30
        ]);
        Produk::create([
            'nama' => 'Tempat Pensil Polos',
            'harga' => 10000,
            'deskripsi' => 'Tempat Pensil dengan diameter 8cm berbahan dasar mendong, kuat dan muat banyak.',
            'gambar' => '16.png',
            'berat' => 20,
            'stok' => 15
        ]);
        Produk::create([
            'nama' => 'Tas Polos Batik Mendong',
            'harga' => 25000,
            'deskripsi' => 'Tas dengan ukuran 30x12x13cm bahan luar mendong dan kain di dalam berkualitas tinggi.',
            'gambar' => '17.png',
            'berat' => 50,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Tempat Pensil Warna Hijau',
            'harga' => 15000,
            'deskripsi' => 'Tempat Pensil berwarna hijau dengan diameter 8cm berbahan dasar mendong, kuat dan muat banyak.',
            'gambar' => '18.png',
            'berat' => 25,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'Tempat Pensil Ulir',
            'harga' => 8000,
            'deskripsi' => 'Tempat pensil ulir dengan panjang 20cm berbahan dasar mendong dengan pilihan warna disertai dengan resleting yang praktis.',
            'gambar' => '19.png',
            'berat' => 10,
            'stok' => 5
        ]);
        Produk::create([
            'nama' => 'Keranjang Bundar Besar',
            'harga' => 55000,
            'deskripsi' => 'Keranjang bundar besar dengan bahan dasar full mendong yang berdiameter 40cm bisa untuk tempat apa saja.',
            'gambar' => '20.png',
            'berat' => 75,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Keranjang Bundar Sedang',
            'harga' => 45000,
            'deskripsi' => 'Keranjang bundar kecil dengan bahan dasar full mendong yang berdiameter 30cm bisa untuk tempat apa saja.',
            'gambar' => '21.png',
            'berat' => 45,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Keranjang Bundar Kecil',
            'harga' => 25000,
            'deskripsi' => 'Keranjang bundar kecil dengan bahan dasar full mendong yang berdiameter 20cm bisa untuk tempat apa saja',
            'gambar' => '22.png',
            'berat' => 25,
            'stok' => 12
        ]);
        Produk::create([
            'nama' => 'Keranjang Kotak Besar',
            'harga' => 55000,
            'deskripsi' => 'Keranjang kotak besar dengan bahan dasar full mendong yang berukuran 40cm bisa untuk tempat apa saja.',
            'gambar' => '23.png',
            'berat' => 95,
            'stok' => 16
        ]);
        Produk::create([
            'nama' => 'Keranjang Kotak Sedang',
            'harga' => 45000,
            'deskripsi' => 'Keranjang kotak sedang dengan bahan dasar full mendong yang berukuran 30cm bisa untuk tempat apa saja.',
            'gambar' => '24.png',
            'berat' => 75,
            'stok' => 10
        ]);
        Produk::create([
            'nama' => 'Keranjang Kotak Kecil',
            'harga' => 25000,
            'deskripsi' => 'Keranjang kotak kecil dengan bahan dasar full mendong yang berukuran 20cm bisa untuk tempat apa saja.',
            'gambar' => '25.png',
            'berat' => 55,
            'stok' => 11
        ]);
        Produk::create([
            'nama' => 'Keranjang Tenteng Besar',
            'harga' => 65000,
            'deskripsi' => 'Keranjang tenteng besar dengan bahan dasar full mendong yang berukuran 40cm, ada tentengannya bisa untuk tempat apa saja.',
            'gambar' => '26.png',
            'berat' => 85,
            'stok' => 12
        ]);
        Produk::create([
            'nama' => 'Keranjang Tenteng Kecil',
            'harga' => 30000,
            'deskripsi' => 'Keranjang tenteng besar dengan bahan dasar full mendong yang berukuran 30cm, ada tentengannya bisa untuk tempat apa saja.',
            'gambar' => '27.png',
            'berat' => 45,
            'stok' => 10
        ]);
    }
}
