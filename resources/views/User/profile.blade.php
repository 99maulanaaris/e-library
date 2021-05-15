@extends('Layouts.app')

@push('js')
    <script type="text/javascript">
        var loadFile = function(event) {
            var output = document.getElementById('imgPreview');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>
@endpush
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @include('alert')
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form action="/user/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="row">
                    <div class="col-12">
                        @if (!auth()->user()->gambar)
                            <img src="{{ asset('assets/images/faces/2.jpg') }}" width="300" id="imgPreview">
                        @else
                            <img src="/storage/{{ $user->gambar }}" width="300" id="imgPreview">
                        @endif
                        <input type="file" name="gambar" class="form-control-file mt-2" onchange="loadFile(event)"
                            accept="image/*">
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" readonly>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" name="identitas" class="form-control" value="{{ $user->indentitas }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                            </div>
                            @error('identitas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="number" name="noHp" class="form-control" value="{{ $user->noHp }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            @error('noHp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-geo"></i>
                                </div>
                            </div>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt">
                <a href="/" class="btn btn-outline-primary btn-block mt-3"> KEMBALI</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-info btn-block mt-3">
                    SIMPAN</button>
            </div>
        </div>
    </form>
@endsection
