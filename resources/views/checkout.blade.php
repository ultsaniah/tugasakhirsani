@extends('layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="px-xl-5">
        <form action="{{ route('checkout.simpan') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="col-6">
                    <label for="hp">No HP</label>
                    <input type="text" name="hp" class="form-control" id="hp">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" class="form-control" id="nama">
                        <option disabled selected>-Pilih-</option>
                        @foreach ($provinsi as $item)
                            <option value="{{ $item->province_id }}">{{ $item->province }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="kota">Kota</label>
                    <select name="kota" class="form-control" id="kota">
                        <option disabled selected>-Pilih-</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="col-6">
                    <label for="hp">No HP</label>
                    <input type="text" name="hp" class="form-control" id="hp">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Cart End -->
@endsection