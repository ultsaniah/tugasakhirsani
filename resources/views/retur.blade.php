@extends('layouts.app')

@section('content')

@if (session('error'))
<div class="container-fluid">
    <div class="px-5">
        <div class="alert alert-danger alert-dismissible fade show" style="height: 50px" role="alert">
            <div class="d-flex justify-content-between">
                <div class=" d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                      {{ session()->get('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Pengembalian</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pengembalian</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-12 mb-3 d-flex justify-content-end">
            <a href="{{ route('retur.tambah') }}" class="btn btn-primary">Tambah[+]</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pesanan</th>
                    <th>Alasan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if (isset($pesanan))
                @foreach ($pesanan as $item)   
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->keranjang[0]->user->name }}</td>
                    <td>{{ $item->keranjang[0]->user->hp }}</td>
                    @php
                        $alamat = json_decode($item->keranjang[0]->user->alamat);
                    @endphp
                    <td>{{ $alamat->alamat.", ".$alamat->kota.", ".$alamat->provinsi }}</td>
                    <td>
                        @if ($item->status_pembayaran == 'settlement')
                            <span class="badge badge-warning">Belum Diproses</span>
                        @elseif ($item->status_pembayaran == 'send')
                            <span class="badge badge-primary">Dikirim</span>
                        @elseif ($item->status_pembayaran == 'accepted')
                            <span class="badge badge-success">Diterima Pelanggan</span>
                        @endif    
                    </td>
                    <td>
                        <a href="{{ route('admin.pesanan.detail', ['id' => $item->id]) }}" role="button" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection