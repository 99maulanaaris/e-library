@extends('Layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @include('alert')
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>History Pinjaman Buku</h4>
            </div>
            <div class="card-body text-center" style="font-size: 15px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Qr Code </th>
                            <th>Judul</th>
                            <th>Tgl Peminjaman</th>
                            <th>Tgl Pengembalian</th>
                            <th>Batas Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $d)
                            <tr>
                                <td>
                                    {!! QrCode::size(50)->generate($d->id) !!}
                                </td>
                                <td>{{ $d->book->judul }}</td>
                                <td>{{ $d->formatPinjam($d->tglPinjam) }}</td>
                                <td>{{ $d->formatKembali($d->tglKembali) }}</td>
                                <td>{{ $d->formatBatasWaktu($d->batasWaktu) }}</td>
                                @if ($d->konfirmasi === 1)
                                    <td>
                                        <span class="badge bg-info">Terkonfirmasi</span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>



    </section>

@endsection
