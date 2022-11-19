@extends('layouts.admin')

@section('content')

<style>
    .bton{
        background-color: #5d754ce8;
        color: white;
    }
    .bton:hover{
        color: white;
        background-color: #314424;
    }
</style>

<div class="d-flex align-items-center tect" style="margin-top: 25px; color: white">
    <h2>
        <div >PERCOBAAN</div>
    </h2>
    <br>
    <div class="mx-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>
    
</div>


<div class="mt-4 w-100" style="margin-right: 15px">
    <div class="card p-4 w-100">
        {{-- <div class="d-flex justify-content-between">
            <div>
                Daftar
            </div>
            <div>
                <button type="button" class="btn bton">Primary</button>
            </div>
        </div> --}}
        <div class="mt-4">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kolom1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection