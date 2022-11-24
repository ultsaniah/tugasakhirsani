@extends('layouts.app')

@section('content')

@if (session('error'))
<div class="container-fluid">
    <div class="px-5">
        <div class="alert alert-danger alert-dismissible fade show" style="height: 50px" role="alert">
            <div class="d-flex justify-content-between">
                <div class=" d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                      {{ session()->get('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Profil</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Profil</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <form action="" method="post" class="col-12">
            @csrf
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ auth()->user()->name ?? null }}">
            </div>
            <div class="mb-3">
                <label for="hp">No HP</label>
                <input type="text" name="hp" class="form-control" id="hp" value="{{ auth()->user()->hp ?? null }}">
            </div>
            <div class="row mb-3">
                @php
                    $alamat = json_decode(auth()->user()->alamat);
                @endphp
                <div class="col-6">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" class="form-control" id="provinsi">
                        <option disabled selected>-Pilih-</option>
                        @if (empty($alamat))
                        @foreach ($provinsi as $item)
                            <option value="{{ $item->province_id.'|'.$item->province }}">{{ $item->province }}</option>
                        @endforeach
                        @else
                        @foreach ($provinsi as $item)
                            <option value="{{ $item->province_id.'|'.$item->province }}" {{ $item->province_id.'|'.$item->province == $alamat->provinsi_id.'|'.$alamat->provinsi ? 'selected' : '' }}>{{ $item->province }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-6">
                    <label for="kota">Kota</label>
                    <select name="kota" class="form-control" id="kota">
                        @if (empty($alamat))
                        <option disabled selected>-Pilih-</option>
                        @else
                        <option disabled selected>{{ $alamat->kota }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="4">{{ $alamat->alamat ?? null }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#provinsi').change(() => {
            var province = $('#provinsi').val().split("|");
            $.ajax({
                url: "{{ route('kota') }}",
                type: 'GET',
                data: {
                    provinsi: province[0]
                },
                success: function(data) {
                    $('select[name=kota]').html(``);
                    $('select[name=kota]').html(`<option disabled selected>-Pilih-</option>`);
                    $.each(data, function(key, value){
                        $('select[name=kota]').append(`<option value="`+value.city_id+`|`+value.city_name+`">`+value.city_name+`</option>`)
                    })
                }
            })
        })
    })
</script>

@endsection