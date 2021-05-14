<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\ReturnBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan()
    {
        $data = Loan::get();
        $tanggal = Carbon::today();
        return view('Laporan.table', compact('data', 'tanggal'));
    }

    public function pengembalian()
    {
        $returns = ReturnBook::get();
        return view('Laporan.pengembalian', compact('returns'));
    }

    public function userLaporan()
    {
        $loans = Loan::where('user_id', auth()->user()->id)->get();
        $tanggal = Carbon::today();
        return view('Laporan.userLaporan', compact('loans', 'tanggal'));
    }
}
