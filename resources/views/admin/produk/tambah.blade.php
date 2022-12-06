@extends('layouts.admin')

@section('content')
@if (isset($produk))
<div class="page-header">
    <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16" style="margin-top: 9px">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
              </svg>
        </span> 
        <span>
            Tambah Data Produk 
        </span>
    </h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.produk.edit') }}" class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{ $produk->id }}">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" id="nama_produk" value="{{ $produk->nama }}" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" value="{{ $produk->harga }}" placeholder="10000">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" id="stok" value="{{ $produk->stok }}" placeholder="10000">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <div class="input-group mb-3">
                        <input type="number" name="berat" class="form-control" id="berat" value="{{ $produk->berat }}" placeholder="1000">
                        <div class="input-group-append">
                            <span class="input-group-text">gram</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea id="deskripsi" class="form-control" rows="4" name="deskripsi">{{ $produk->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="img" id="img" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Gambar">
                        <span class="input-group-append">
                            <label for="img" class="file-upload-browse btn btn-gradient-primary" type="button">Upload</label>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                <a href="{{ route('admin.produk') }}" class="btn btn-light">Kembali</a>
              </form>
          </div>
        </div>
    </div>
</div>
@else
<div class="page-header">
    <h3 class="page-title">
        Tambah Data Produk
    </h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.produk.simpan') }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" id="nama_produk" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label for="stok">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="10000">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" id="stok" placeholder="10">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <div class="input-group mb-3">
                        <input type="number" name="berat" class="form-control" id="berat" placeholder="1000">
                        <div class="input-group-append">
                            <span class="input-group-text">gram</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea id="deskripsi" class="form-control" rows="4" name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                    {{ csrf_field() }}
                    <label>Upload Gambar</label>
                    <input type="file" name="img" id="img" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                       
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Gambar">
                        <span class="input-group-append">
                            <label for="img" class="file-upload-browse btn btn-gradient-primary" type="button">Upload</label>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                <a href="{{ route('admin.produk') }}" class="btn btn-light">Kembali</a>
              </form>
          </div>
        </div>
    </div>
</div>
@endif
@endsection