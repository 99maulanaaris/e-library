<html>

<head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 8pt;
        }

        table {
            margin-top: -8%;
        }

    </style>
    <div class="row">
        <div class="col-md-4">
            <img src="assets/images/msp.png" width="130" class="img-fluid">
        </div>
        <div class="col-md-3 text-center">
            <h5>Laporan Data Peminjaman Buku </h5>
            <h6> Museum Sumpah Pemuda</h6>
            <p>Jl. Keramat Raya No 12 Jakarta Pusat</p>
        </div>


    </div>

    <table class='table table-lg text-center'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>User</th>
                <th>Peminjaman</th>
                <th>Batas Waktu</th>
                <th>Pengembalian</th>
                <th>Telat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->book->judul }}</td>
                    <td>{{ $d->user->nama }}</td>
                    <td>{{ $d->formatPinjam($d->tglPinjam) }}</td>
                    <td>{{ $d->formatBatasWaktu($d->batasWaktu) }}</td>
                    <td>{{ $d->formatKembali($d->tglKembali) }}</td>
                    @if ($tanggal > $d->batasWaktu)
                        <td class="text-bold">Telat</td>
                    @else
                        <td class="text-bold">Tidak</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
