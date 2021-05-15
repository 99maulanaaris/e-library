<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::simplePaginate(5);
        return view('User.user', compact('user'));
    }

    public function showBuku()
    {
        $books = Book::simplePaginate(3);
        $curent = Carbon::now();
        return view('User.buku', compact('books', 'curent'));
    }

    public function store($id)
    {
        $data = Book::find($id);
        $curent = Carbon::now();
        $expire = Carbon::now();
        $loan = Loan::create([
            'book_id' => $data->id,
            'pinjam' => $curent,
            'kembali' => $expire->addDays(7),
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('laporan.user'))->with('alertSuccess', 'Berhasil Memesan');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);


        return view('User.profile', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        request()->validate([
            'nama' => 'required|string',
            'identitas' => 'required|string',
            'noHp' => 'required|numeric',
            'alamat' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg'
        ]);


        # Cek Apakah Ada Gambar Di DB
        if ($user->gambar) {
            # Cek Apakah user upload gambar baru
            if (request()->file('gambar')) {
                $user->noHp = request('noHp');
                $user->indentitas = request('identitas');
                $user->alamat = request('alamat');
                $user->gambar = request()->file('gambar')->store('image/user');
                $user->save();
                return back()->with('alertSuccess', 'Data Berhasil Di Perbaharui');
            } else {
                $user->noHp = request('noHp');
                $user->indentitas = request('identitas');
                $user->alamat = request('alamat');
                $user->save();
                return back()->with('alertSuccess', 'Data Berhasil Di Perbaharui');
            }
        } else {
            return back()->with('alertError', 'Harap Masukan Gambar Dahulu');
        }
    }
}
