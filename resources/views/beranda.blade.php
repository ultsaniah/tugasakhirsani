@extends('layouts.app')

@section('content')

<!-- Product Carousel slide Start -->
<div id="header-carousel" class="col-md-12 carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="img/cover.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    {{-- <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4> --}}
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Kerajinan Mendong</h3>
                    <a href="" class="btn btn-light py-2 px-3">Belanja Sekarang</a>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    {{-- <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4> --}}
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Kerajinan Mendong</h3>
                    <a href="" class="btn btn-light py-2 px-3">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
<!-- Product Carousel slide End -->

<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row justify-content-md-center px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Kualitas Produk Terjamin</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Pengiriman ke seluruh kota </h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">7 Hari Pengembalian</h5>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div> --}}
    </div>
</div>
<!-- Featured End -->


<!-- Products Start -->
<div class="container-fluid pt-5" id="produk">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Produk</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($produk as $item)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ asset('produk/'.$item->gambar) }}" alt="">
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
