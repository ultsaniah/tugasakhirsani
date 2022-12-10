@extends('layouts.app')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Pesanan</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pesanan {{ $keranjang[0]->pesanan_id }}</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subtotal = 0;
                @endphp
                @foreach ($keranjang as $item)
                @php
                    $total = 0;
                    $total = $item->produk->harga * $item->jumlah;
                    $subtotal += $total;
                @endphp
                <tr>
                    <td class="align-middle"><img src="{{ asset('produk/'.$item->produk->gambar) }}" alt="" style="width: 50px;"> {{ $item->produk->nama }}</td>
                    <td class="align-middle">Rp{{ number_format($item->produk->harga, 0, 0, '.') }}</td>
                    <td class="align-middle">
                        {{ $item->jumlah }}
                    </td>
                    <td class="align-middle">Rp{{ number_format($total, 0 ,0 ,'.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Products End -->

@endsection
