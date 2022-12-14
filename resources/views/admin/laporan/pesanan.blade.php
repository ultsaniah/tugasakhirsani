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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @if ($pesanan->count() > 0)
                    @php
                        $no++;
                    @endphp
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
                                Belum Diproses
                            @elseif ($item->status_pembayaran == 'send')
                                Dikirim
                            @elseif ($item->status_pembayaran == 'delivered')
                                Diterima Pelanggan
                            @elseif ($item->status_pembayaran == 'retur accepted')
                                Retur Diterima
                            @elseif ($item->status_pembayaran == 'retur denied')
                                Retur Ditolak
                            @elseif ($item->status_pembayaran == 'retur')
                                Retur Diproses
                            @endif    
                        </td>
                    </tr>
                    
                    @endforeach
                    @else
                    <tr>
                        <td class="col-12 text-center" colspan="5">Belum Ada Pesanan</td>
                    </tr>
                    @endif
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>



@endsection