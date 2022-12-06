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
            Data Retur 
        </span>
    </h3>

    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.laporan.retur.cetak') }}" class="btn btn-primary">Cetak Laporan Retur</a>
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
                        <th>Kode Pesanan</th>
                        <th>Alasan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($retur))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($retur as $item)   
                    <tr>
                        <td>{{ $no; }}</td>
                        <td>{{ $item->pesanan->order_id }}</td>
                        <td>{{ $item->alasan }}</td>
                        <td>
                            @if ($item->status == 'accepted')
                                Diterima
                            @elseif ($item->status == 'denied')
                                Ditolak
                            @else
                                Proses
                            @endif
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
    </div>
</div>

@endsection