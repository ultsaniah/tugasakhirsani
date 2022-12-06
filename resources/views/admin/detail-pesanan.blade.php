@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="margin-top: 9px">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
        </span> 
        <span>
            Data Pesanan
        </span>
    </h3>
</div>


<div class="row">

    {{-- go menampilkan data produk sek di pesan --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($keranjang as $item)   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
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

    {{-- untuk menginputkan resi pengiriman apabila dah bayar --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3>Masukkan Resi</h3>
                <form action="{{ route('admin.pesanan.resi') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="form-control" id="id" value="{{ $keranjang[0]->pesanan_id }}">
                    <div class="mb-3">
                        <label for="resi">Resi Pengiriman</label>
                        <input type="text" name="resi" class="form-control" id="resi">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection