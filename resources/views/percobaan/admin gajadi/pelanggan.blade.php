@extends('layouts.admin')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Laila&display=swap" rel="stylesheet">

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: #5d754ce8!important;
      color: white!important; /*change the hover text color*/
    }

    /*below block of css for change style when active*/
    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
      background: #5d754ce8!important;
      color: white!important;
    }

    .jdul{
        font-family: 'Baloo 2', cursive;
        }
    .menu {
        font-family: 'Laila', sans-serif;
    }
</style>

<div class="block align-items-center" style="margin-top: 25px; color: white">
    <div>
        <h2 class="jdul">
            DATA PELANGGAN
        </h2>
    </div>
    <div class="mx-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item menu"><a href="{{ url('dashboard') }}" style="text-decoration: none">Dashboard</a></li>
              <li class="breadcrumb-item active menu" aria-current="page">Data Pelanggan</li>
            </ol>
        </nav>
    </div>
    
</div>

<div class="mt-4 w-100" style="margin-right: 15px">
    <div class="card p-4 w-100">
        <div class="mt-1">
            <table id="table-master" class="table table-hover">
                <thead>
                    {{-- kolom untuk menampilkan data --}}
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- pemanggilan dalam opo y?? --}}
                   
                @php
                    $no = 1;
                @endphp
               @foreach($pembeli as $item)
        
               <tr>
              
                <td>{{ $no++ }}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->id }}</td>
                
               </tr>
        
               @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#table-master').DataTable({
            'search': true,
            'pageLength': 10,
        });
    });
</script>
    
@endsection