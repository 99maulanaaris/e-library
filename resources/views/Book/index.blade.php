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
                        <li class="breadcrumb-item active" aria-current="page">Breadcrumb</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Data Buku</h4>
                    </div>
                    <div class="card-body" style="font-size: 18px">

                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0 text-center table-lg">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th>NO</th>
                                        <th>GAMBAR</th>
                                        <th>NO ISBN</th>
                                        <th>JUDUL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="/storage/{{ $d->gambar }}" width="50">
                                            </td>
                                            <td class="text-bold-500">{{ $d->noIsbn }}</td>
                                            <td>{{ $d->judul }}</td>
                                            <td colspan="">
                                                <a href="#" class="text-info "><i class="bi bi-pencil-square"></i></a> |
                                                <a href="#" class="text-primary "><i class="bi bi-archive"></i></a> |
                                                <a href="#" class="text-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
