<html>

<head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"
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

        hr {
            border: 2px black;
            margin-top: -15%;
            margin-bottom: 10%;

        }

        footer {
            position: absolute;
            bottom: 10%;
        }

        .footer-wrapper {
            margin-left: -90%;
        }

        .tanggal {
            position: absolute;
            bottom: 30%;
            margin-left: -30%;
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
    <hr>
    @yield('content')

    <div class="tanggal">
        <span>Jakarta,</span>
    </div>

    <footer>
        <div class="footer-wrapper">
            <span>(.....................)</span>
        </div>
    </footer>
</body>

</html>
