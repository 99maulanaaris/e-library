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
}
