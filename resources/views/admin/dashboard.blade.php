@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="margin-top: 9px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
              </svg>
        </span> 
        <span>
            Dashboard 
        </span>
    </h3>
</div>

<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
            <h4 class="font-weight-normal mb-3">Produk
            </h4>
            <h2 class="mb-5">
                @php
                    $produk = App\Models\Produk::count();
                @endphp
                {{ $produk }}
            </h2>
            <h6 class="card-text">Buah</h6>
        </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
            <h4 class="font-weight-normal mb-3">Pesanan
            </h4>
            <h2 class="mb-5">
                @php
                    $pesanan = App\Models\Pesanan::count();
                @endphp
                {{ $pesanan }}
            </h2>
            <h6 class="card-text">Pesanan</h6>
        </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
            <h4 class="font-weight-normal mb-3">Retur
            </h4>
            <h2 class="mb-5">
                @php
                    $retur = App\Models\Retur::count();
                @endphp
                {{ $retur }}
            </h2>
            <h6 class="card-text">Retur</h6>
        </div>
        </div>
    </div>
</div>




@endsection