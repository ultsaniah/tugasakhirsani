@extends('layouts.app')

@section('content')

<!-- Carousel slide Start -->
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
            <img class="img-fluid" src="img/cover2.jpg" alt="Image">
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
<!-- Carousel slide End -->

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


<!-- Gallery Start-->
<div class="row container-fluid pt-5 justify-content-md-center">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
      <img src="img/cover2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="img" style="height: 185px"/>
  
      <img
        src="img/13.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="img"
        style="height: 425px"
      />
    </div>
  
    <div class="col-lg-3 mb-4 mb-lg-0">
      <img
        src="img/IMG20221126132151.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="img"  style="height: 425px"
      />
  
      <img
        src="img/IMG20221126131246.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="img" style="height: 185px"
      />
    </div>
  
    <div class="col-lg-3 mb-4 mb-lg-0">
      <img
        src="img/IMG20221126131039.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="img" style="height: 185px"
      />
  
      <img
        src="img/11.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="img" style="height: 425px"
      />
    </div>
  </div>
<!-- Gallery END -->


@endsection
