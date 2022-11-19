@extends('layouts.app')

@section('content')
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