@extends('layouts.app')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Pesanan</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pesanan</p>
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
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                        @elseif ($item->status_pembayaran == 'pending')
                            <span class="badge badge-warning">Belum Dibayar</span>
                        @elseif ($item->status_pembayaran == 'send')
                            <span class="badge badge-info">Dikirim</span>
                        @elseif ($item->status_pembayaran == 'delivered')
                            <span class="badge badge-success">Diterima Pelanggan</span>
                        @elseif ($item->status_pembayaran == 'retur')
                            <span class="badge badge-danger">Retur Produk</span>
                        @elseif ($item->status_pembayaran == 'retur accepted')
                            <span class="badge badge-success">Retur Diterima</span>
                        @elseif ($item->status_pembayaran == 'retur denied')
                            <span class="badge badge-danger">Retur Ditolak</span>
                        @endif    
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.pesanan.detail', ['id' => $item->id]) }}" role="button" class="btn btn-primary">Detail</a>
                            @if ($item->status_pembayaran == 'send' || 'delivered')
                            
                            <div class="nav-item dropdown ml-3">
                                <a href="#" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                </a>
                                <div class="dropdown-menu" style="margin-left: -2rem; margin-top: -1rem">
                                    <li>
                                    @if ($item->status_pembayaran == 'send')
                                    <a href="{{ route('pesanan.terima', ['id' => $item->id]) }}" class="dropdown-item">Terima Pesanan</a></li>
                                    @elseif ($item->status_pembayaran == 'delivered')
                                    <a href="{{ route('retur.tambah', ['id' => $item->id]) }}" class="dropdown-item">Pengembalian</a>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
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
<!-- Products End -->

@endsection
