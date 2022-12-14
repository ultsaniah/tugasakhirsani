@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h3 class="page-title d-flex align-items-center">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-top: 9px">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
              </svg>
        </span> 
        <span>
            Data Pelanggan 
        </span>
    </h3>
</div>

{{-- menampilkan data pembeli --}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pembeli as $item)   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->hp }}</td>
                        @if (isset($item->alamat))
                            @php
                                $alamat = json_decode($item->alamat);
                            @endphp
                        <td>{{ $alamat->alamat.", ".$alamat->kota.", ".$alamat->provinsi }}</td>
                        @else
                        <td></td>
                        @endif
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