@extends('layouts.admin')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Laila&display=swap" rel="stylesheet">

<style>
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
            RETUR 
        </h2>
    </div>
    <div class="mx-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item menu"><a href="{{ url('dashboard') }}" style="text-decoration: none">Dashboard</a></li>
              <li class="breadcrumb-item active menu" aria-current="page">Retur</li>
            </ol>
        </nav>
    </div>
    
</div>

    <div class="mt-4 w-100" style="margin-right: 15px">
        <div class="card p-4 w-100">
            ISI DATA
        </div>
    </div>
@endsection