@extends('layouts.app')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Daftar Produk</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Produk</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Products Start -->
<div class="container-fluid pt-5" id="produk">
    {{-- <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Produk</span></h2>
    </div> --}}
    <div class="row px-xl-5 pb-3">
        @foreach ($produk as $item)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" style="height: 250px; width: 100px" src="{{ asset('produk/'.$item->gambar) }}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $item->nama }}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>Rp{{ number_format($item->harga, 0, 0, '.') }}</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detail</a>
                    <a href="{{ route('keranjang.tambah.get', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Tambah Keranjang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->

@endsection
