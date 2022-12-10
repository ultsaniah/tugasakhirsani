<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Himari Craft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      @media print {
        .cetak {
          visibility: hidden;
        }
      }
    </style>
  </head>
  <body>

    <div class="container h-100 m-auto py-5">
      <div class="d-flex justify-content-end mb-3 cetak">
        <button class="btn btn-success" onclick="window.print()">
          Cetak
        </button>
      </div>
      <div class="card">
          <div class="card-header text-center">
            <h3>
              Himari craft
            </h3>
            
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <div>
                
                <div class="d-flex" style="font-size: 15px;">
                  <span>Nama : {{ ucfirst(auth()->user()->name) }}</span>
                </div>
                <div class="d-flex" style="font-size: 15px;">
                  <span>No HP : {{ auth()->user()->hp }}</span>
                </div>
                <div class="d-flex" style="font-size: 15px;">
                  <span>
                    @if (isset(auth()->user()->alamat))
                            @php
                                $alamat = json_decode(auth()->user()->alamat);
                            @endphp
                        Alamat : {{ $alamat->alamat.", ".$alamat->kota.", ".$alamat->provinsi }}
                        @else
                        
                      @endif
                  </span>
                </div>
              </div>
              <div class="container-fluid pt-5">
                <div class="row">
                    <div class="col-lg-12 table-responsive mb-5">
                        <table class="table table-bordered text-center mb-0">
                            <thead class="">
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
                                @endphp
                                @foreach ($keranjang as $item)
                                @php
                                    $total = 0;
                                    $total = $item->produk->harga * $item->jumlah;
                                    $subtotal += $total;
                                @endphp
                                <tr>
                                    <td class="align-middle">{{ $item->produk->nama }}</td>
                                    <td class="align-middle">Rp{{ number_format($item->produk->harga, 0, 0, '.') }}</td>
                                    <td class="align-middle">
                                        {{ $item->jumlah }}
                                    </td>
                                    <td class="align-middle">Rp{{ number_format($total, 0 ,0 ,'.') }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td colspan="3">
                                    <div class="d-flex justify-content-end">Subotal</div>
                                  </td>
                                  <td>Rp{{ number_format($subtotal, 0 ,0 ,'.') }}</td>
                                </tr>
                                <tr>
                                  <td colspan="3">
                                    <div class="d-flex justify-content-end">Ongkir</div>
                                  </td>
                                  <td>Rp{{ number_format($keranjang[0]->pesanan->ongkir, 0 ,0 ,'.') }}</td>
                                </tr>
                                <tr>
                                  @php
                                      $total = $subtotal + $keranjang[0]->pesanan->ongkir;
                                  @endphp
                                  <td colspan="3">
                                    <div class="d-flex justify-content-end">Total</div>
                                  </td>
                                  <td>Rp{{ number_format($total, 0 ,0 ,'.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
          </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>