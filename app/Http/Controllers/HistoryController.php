<?php

namespace App\Http\Controllers;

use App\Models\History;
use BaconQrCode\Encoder\QrCode;
use Generator;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $data = History::get();
        return view('History.admin', compact('data'));
    }

    public function userHistory()
    {
        $data = History::where('user_id', auth()->user()->id)->get();

        return view('History.user', compact('data'));
    }
}
