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
                <h4>Laporan Pinjaman Buku</h4>
            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Judul Buku</th>
                            <th>Nomer Hp</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)

                            <tr>
                                <td>{{ $d->user->nama }}</td>
                                <td>{{ $d->book->judul }}</td>
                                <td>{{ $d->user->noHp }}</td>
                                <td>{{ $d->formatPinjam($d->pinjam) }}</td>
                                <td>{{ $d->formatKembali($d->kembali) }}</td>
                                @if ($tanggal > $d->kembali)
                                    <td>
                                        <span class="badge bg-danger">Telat</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-success">Aktif</span>
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
