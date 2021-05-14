<?php

namespace App\Http\Controllers;

use App\Models\History;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Http\Request;
use PDF;




class CetakController extends Controller
{
    public function index()
    {
        $data = History::all();
        $tanggal = Carbon::today();
        $qrcode = new Generator;
        $qrcode->size(100)->generate($data);
        $pdf = PDF::loadview('Cetak.cetakpdf', compact('data', 'tanggal', 'qrcode'))->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function download()
    {
        $data = History::all();
        $tanggal = Carbon::today();


        $pdf = PDF::loadview('Cetak.cetakpdf', compact('data', 'tanggal'))->setPaper('A4', 'landscape');
        return $pdf->download('Laporan.pdf');
    }
}
