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
                <h4>Daftar User</h4>
            </div>
            <div class="card-body text-center" style="font-size: 18px">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomer Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            @if ($u->hasRole('User'))
                                <tr>
                                    <td>
                                        <img src={{ asset('assets/images/faces/1.jpg') }} width="30"
                                            class="img-fluid rounded-circle">
                                    </td>
                                    <td>{{ $u->nama }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->noHp }}</td>
                                    <td>
                                        @if ($u->email_verified_at)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td colspan="3">
                                        <a href="#" class="text-danger"><i class="bi bi-trash"></i></a> |
                                        <a href="#" class="text-info"><i class="bi bi-archive"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
