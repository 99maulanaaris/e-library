<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\History;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::today();
        $user = User::role('User')->get();
        $pinjam = Loan::get();
        $totalBooks = Book::get();
        $book = Loan::where('user_id', auth()->user()->id)->count();
        $waktu = Loan::where('user_id', auth()->user()->id)->where('kembali', '>', $tanggal)->get();
        $books = DB::table('books')->limit(3)->get();
        $telat = DB::table('loans')->where('user_id', auth()->user()->id)->where('kembali', '<=', $tanggal)->get();
        $return = History::get()->count();
        $kembali = History::where('user_id', auth()->user()->id)->count();
        return view('Home.index', compact('user', 'book', 'books', 'pinjam', 'telat', 'waktu', 'return', 'kembali', 'totalBooks'));
    }
}
