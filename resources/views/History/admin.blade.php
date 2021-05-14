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
            <div class="card-body">
                <a href={{ route('download.pdf') }} class="text-info" style="margin-right: 10px"><span
                        class="btn btn-outline-info"><i class="bi bi-download"></i></span></a>
                <a href={{ route('cetak.pdf') }} class="text-info" target="_blank"><span class="btn btn-outline-dark"><i
                            class="bi bi-printer"></i></span></a>

            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>User</th>
                            <th>Tgl Peminjaman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->book->judul }}</td>
                                <td>{{ $d->user->nama }}</td>
                                <td>{{ $d->formatPinjam($d->tglPinjam) }}</td>
                                @if ($d->konfirmasi === 1)
                                    <td>
                                        <span class="badge bg-info">Terkonfirmasi</span>
                                    </td>
                                @endif
                                <td>
                                    <a href={{ route('download.pdf') }} class="text-info" style="margin-right: 10px"><span
                                            class="btn btn-outline-info"><i class="bi bi-download"></i></span></a>
                                    <a href={{ route('cetak.pdf') }} class="text-info" target="_blank"><span
                                            class="btn btn-outline-dark"><i class="bi bi-printer"></i></span></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </section>

@endsection
