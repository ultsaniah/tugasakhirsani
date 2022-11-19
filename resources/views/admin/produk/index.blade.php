@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16" style="margin-top: 9px">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
              </svg>
        </span> 
        <span>
            Data Produk 
        </span>
    </h3>

    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.produk.tambah') }}" class="btn btn-primary">[+] Tambah</a>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Berat</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($produk as $item)   
                    <tr>
                        <td>{{ $no; }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>Rp{{ number_format($item->harga, 0 , 0, '.') }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->berat }} gram</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <img src="{{ asset('produk/'.$item->gambar) }}" alt="">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.produk.ubah', ['id' => $item->id]) }}" class="btn btn-primary" style="margin-right: 5px">Edit</a>
                                <a href="{{ route('admin.produk.hapus', ['id' => $item->id]) }}" class="btn btn-danger" style="margin-left: 5px">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

@endsection