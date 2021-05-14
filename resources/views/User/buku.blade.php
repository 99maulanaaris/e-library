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
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-lg-4 ml-2 mr-2">
                        <div class="card">
                            <img src="/storage/{{ $book->gambar }}" class="card-img-top" style="max-height: 150px; ">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->judul }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Penulis : {{ $book->penulis }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pnerbit : {{ $book->penerbit }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <form action="buku/{{ $book->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Pinjam</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center">
                {{ $books->links() }}
            </div>
        </div>

    </section>
@endsection
