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
                <h4>Daftar Checkout</h4>
            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Waktu Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() != 0)
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->loan->book->judul }}</td>
                                    <td>{{ $d->loan->formatPinjam($d->loan->pinjam) }}</td>
                                    <td>{{ $d->loan->formatKembali($d->loan->kembali) }}</td>
                                    <td>{{ $d->tglKembali }}</td>
                                    @if ($d->konfirmasi === 0)
                                        <td>
                                            <span class="badge bg-danger">Belum Konfirmasi</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-light-success">Terkonfirmasi</span>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><span class="badge bg-info text-center">Maaf Data Anda Kosong</span></td>
                            </tr>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
