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
                <h4>Daftar Pinjaman Buku</h4>
            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pinjam</th>
                            <th>Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->book->judul }}</td>
                                <td>{{ $loan->formatPinjam($loan->pinjam) }}</td>
                                <td>{{ $loan->formatKembali($loan->kembali) }}</td>
                                @if ($tanggal > $loan->kembali)
                                    <td><span class="badge bg-danger">Telat</span></td>
                                @else
                                    <td><span class="badge bg-success">Aktif</span></td>
                                @endif

                                @if ($loan->getDataLoan($loan->id)->count())
                                    <td>
                                        <h3 class="badge bg-light-warning">Telah CheckOut</h3>
                                    </td>
                                @else
                                    <td>
                                        <form action="/checkout/loan/{{ $loan->id }}" method="post">
                                            @csrf
                                            <button type="submit" class="text-dark badge bg-light-danger">Cehck Out</button>
                                        </form>
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
