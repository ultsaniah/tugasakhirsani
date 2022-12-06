<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="p-5">

    <h1>KOP LAPORAN IKI</h1>

    <table class="table">
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

    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>