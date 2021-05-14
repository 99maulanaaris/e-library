<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::simplePaginate(3);
        return view('Book.index', compact('data'));
    }

    public function tambah()
    {
        return view('Book.tambah');
    }

    public function store()
    {
        request()->validate([
            'gambar' => 'required|mimes:png,jpg,jpeg,svg',
            'noIsbn' => 'required|numeric',
            'judul' => 'required',
            'penulis' => 'required|string',
            'penerbit' => 'required',
            'tebalHalaman' => 'required|numeric',
        ]);


        $data = Book::create([
            'gambar' => request()->file('gambar')->store('/image/book'),
            'noIsbn' => request('noIsbn'),
            'judul' => request('judul'),
            'penulis' => request('penulis'),
            'penerbit' => request('penerbit'),
            'tebalHalaman' => request('tebalHalaman')
        ]);

        return redirect(route('table.buku'))->with('alertSuccess', 'Selamat, Data Berhasil Di Tambahkan');
    }
}
