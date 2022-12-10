@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Produk</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Detail Produk</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ asset('produk/'.$produk->gambar) }}" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $produk->nama }}</h3>
            <div class="d-flex mb-3">
                
            </div>
            <h3 class="font-weight-semi-bold mb-4">Rp{{ number_format($produk->harga, 0, 0, '.') }}</h3>
            <p class="mb-4">{{ $produk->deskripsi }}</p>
            <h5>Stok Tersedia</h5>
            <p class="mb-4">{{ $produk->stok }} Buah</p>
            {{-- <h5>Berat Produk</h5>
            <p>{{ $produk->berat }} Gram</p> --}}
            <div class="d-flex align-items-center mb-4 pt-2 mt-4">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus" >
                        <i class="fa fa-minus"></i>
                        </button>
                    </div> 
                    <input type="text" id="jml_input" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                
                
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <button onclick="keranjang()" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Tambah Keranjang</button>
            </div>
            <form action="{{ route('keranjang.tambah.post') }}" class="d-none" method="post" id="form-pesan">
                @csrf
                <input type="hidden" name="jumlah">
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            </form>
        </div>
    </div>
</div>
<!-- Shop Detail End -->

<script>
    
    function keranjang(){
        var jml = document.querySelector('#jml_input').value;
        document.querySelector('input[name=jumlah]').value = jml;
        document.querySelector('#form-pesan').submit();
    }
</script>

@endsection