@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Keranjang Belanja</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Keranjang Belanja</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
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
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="{{ route('keranjang.minus', ['id' => $item->id]) }}" role="button" class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $item->jumlah }}">
                                <div class="input-group-btn">
                                    <a href="{{ route('keranjang.plus', ['id' => $item->id]) }}" role="button" class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">Rp{{ number_format($total, 0 ,0 ,'.') }}</td>
                        <td class="align-middle"><a href="{{ route('keranjang.hapus', ['id' => $item->id]) }}" role="button" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Ringkasan Belanja</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Total</h6>
                        <h6 class="font-weight-medium">Rp{{ number_format($subtotal, 0, 0, '.') }}</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <a href="{{ route('checkout') }}" role="button" class="btn btn-block btn-primary my-3 py-3">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection