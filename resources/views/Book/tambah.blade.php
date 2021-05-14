@extends('Layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts" style="margin-left: 5%; margin-right: 5%">
        <div class="row match-height">
            <div class="col-md-12 col-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Tambah Data Buku</h4>
                    </div>
                    <div class="card-content" style="margin-left:3%; margin-right: 3%">
                        <div class="card-body">
                            <form class="form form-horizontal" action="tambah" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No ISBN</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="first-name" class="form-control" name="noIsbn">
                                            @error('noIsbn')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Judul</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-id" class="form-control" name="judul">
                                            @error('judul')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penulis</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="penulis" class="form-control" name="penulis">
                                            @error('penulis')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penerbit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="penerbit" class="form-control" name="penerbit">
                                            @error('penerbit')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jumlah Halaman</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="tebalHalaman" class="form-control" name="tebalHalaman">
                                            @error('tebalHalaman')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <input type="file" id="gambar" class="file-control" name="gambar">
                                            @error('gambar')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
