<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Loan;
use App\Models\ReturnBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $data = ReturnBook::where('user_id', auth()->user()->id)->get();
        $tanggal = Carbon::today();
        return view('Checkout.table', compact('data', 'tanggal'));
    }

    public function checkout($id)
    {

        ReturnBook::create([
            'loan_id' => $id,
            'tglKembali' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect(route('checkout.table'))->with('alertSuccess', 'Harap Konfirmasi Penegembalian buku');
    }

    public function konfirmasi($id)
    {
        $return = ReturnBook::find($id);

        if ($return) {
            $history = History::create([
                'book_id' => $return->loan->book_id,
                'user_id' => $return->loan->user_id,
                'tglPinjam' => $return->loan->pinjam,
                'tglKembali' => $return->tglKembali,
                'batasWaktu' => $return->loan->kembali,
                'konfirmasi' => 1
            ]);

            if ($history) {
                $data = Loan::find($return->loan_id);
                $data->delete();
                $return->delete();
            }
        }

        return redirect(route('history'))->with('alertSuccess', 'Berhasil Memperbarui data');
    }
}
