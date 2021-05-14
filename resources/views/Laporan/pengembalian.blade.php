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
                <h4>Laporan Pengembalian Buku</h4>
            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>User</th>
                            <th>Nomer Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($returns->count() != 0)
                            @foreach ($returns as $return)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $return->loan->book->judul }}</td>
                                <td>{{ $return->user->nama }}</td>
                                <td>{{ $return->user->noHp }}</td>
                                @if ($return->konfirmasi === 0)
                                    <td>
                                        <span class="badge bg-light-danger">Belum Konfirmasi</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-light-success">Terkonfirmasi</span>
                                    </td>
                                @endif
                                @if ($return->konfirmasi === 1)
                                    <td><span class="badge bg-info">Telah Konfirmasi</span></td>
                                @else

                                    <td>
                                        <form action="/checkout/kembali/{{ $return->id }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="badge bg-light-info">Konfirmasi</button>
                                        </form>
                                    </td>
                                @endif
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
