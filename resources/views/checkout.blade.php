@extends('layouts.app')

@if (Session::has('token'))
@section('css')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-pkPrydb_zQO1DaPU"></script>
@endsection
@endif

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Beranda</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="px-xl-5">
        <form action="{{ route('checkout.simpan') }}" method="post">

            {{-- data user ngambil dari id user --}}
            @csrf
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ auth()->user()->name ?? null }}" readonly>
            </div>
            <div class="mb-3">
                <label for="hp">No HP</label>
                <input type="text" name="hp" class="form-control" id="hp" value="{{ auth()->user()->hp ?? null }}" readonly>
            </div>
            <div class="row mb-3">
                @php
                    $alamat = json_decode(auth()->user()->alamat);
                @endphp
                <div class="col-6">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" class="form-control" id="provinsi" disabled>
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
                    <select name="kota" class="form-control" id="kota" disabled>
                        @if (empty($alamat))
                        <option disabled selected>-Pilih-</option>
                        @else
                        <option value="{{ $alamat->kota_id.'|'.$alamat->kota }}" selected>{{ $alamat->kota }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" disabled class="form-control" id="alamat" rows="4">{{ $alamat->alamat ?? null }}</textarea>
            </div>

            {{-- bagian pilih kurir dan ongkir --}}
            <div class="row mb-3">
                <div class="col-6">
                    <label for="kurir">Kurir</label>
                    <select name="kurir" class="form-control" id="kurir" required>
                        <option selected disabled>-Pilih-</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="ongkir">Ongkos Kirim</label>
                    <input type="text" name="ongkir" class="form-control" id="ongkir">
                </div>
            </div>


            <div class="mb-3">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $subtotal = 0;
                            $berat = 0;
                        @endphp
                        @foreach ($keranjang as $item)
                        @php
                            $total = 0;
                            $total = $item->produk->harga * $item->jumlah;
                            $subtotal += $total;
                            $berat += (int) $item->produk->berat * $item->jumlah;
                        @endphp
                        <tr>
                            <td class="align-middle"><img src="{{ asset('produk/'.$item->produk->gambar) }}" alt="" style="width: 50px;"> {{ $item->produk->nama }}</td>
                            <td class="align-middle">Rp{{ number_format($item->produk->harga, 0, 0, '.') }}</td>
                            <td class="align-middle">
                                <input type="text" class="form-control form-control-sm text-center" value="{{ $item->jumlah }}" readonly>
                            </td>
                            <td class="align-middle">Rp{{ number_format($total, 0 ,0 ,'.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-3 d-flex justify-content-end">
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Ringkasan Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">Rp{{ number_format($subtotal, 0, 0, '.') }}</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Ongkir</h6>
                                <h6 class="font-weight-medium" id="ongkirRing">Rp{{ number_format(0, 0, 0, '.') }}</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Total</h6>
                                <h6 class="font-weight-medium" id="totalRing">Rp{{ number_format($subtotal, 0, 0, '.') }}</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <input type="hidden" name="total" required>
                            <button type="submit" class="btn btn-block btn-primary my-3 py-3">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Cart End -->


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

        $('#kurir').change(() => {
            var kota = $('#kota').val().split("|");
            var tujuan = kota[0];
            var berat = '{{ $berat }}';
            var kurir = $('#kurir').val();
            console.log(tujuan+" "+berat+" "+kurir)
            ongkir(tujuan, berat, kurir);
        })

        function ongkir(tujuan = null, berat = null, kurir = null) {
            if(kurir != null){
                $.ajax({
                    url: "{{ route('ongkir') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tujuan: tujuan,
                        berat: berat,
                        kurir: kurir
                    },
                    success: function(data) {
                        var subtotal = '{{ $subtotal }}';
                        var total = Number(subtotal) + Number(data);
                        $('#ongkir').val(data);
                        $('#ongkirRing').html(formatRupiah(data, "Rp"));
                        $('#totalRing').html(formatRupiah(total.toString(), "Rp"));
                        $('input[name=total]').val(total);
                    }
                })
            }
        }

        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
		}
    })
</script>

@if (Session::has('token'))
<form action="{{ route('bayar.simpan') }}" method="post" id="json-form">
    @csrf
    <input type="hidden" name="id" value="{{ Session::get('id') }}" id="id">
    <input type="hidden" name="json" id="json">
</form>
<script type="text/javascript">
    window.snap.pay('{{ Session::get("token") }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
        send_response(result)
        },
        onPending: function(result){
          /* You may add your own implementation here */
        //   alert("wating your payment!"); console.log(result);
        send_response(result)
        },
        onError: function(result){
          /* You may add your own implementation here */
        //   alert("payment failed!"); console.log(result);
        send_response(result)
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    function send_response(result){
        document.querySelector('#json').value = JSON.stringify(result);
        document.querySelector('#json-form').submit();
    }
  </script>
@endif
@endsection