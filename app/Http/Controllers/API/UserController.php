<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\History;
use App\Models\Loan;
use App\Models\ReturnBook;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {

        try {
            // Validasi input
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            // Cek Password Hash
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            // Login
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticeted');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'email|required',
                'password' => 'required|min:8'
            ]);
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user = User::where('email', $request->email)->first();
            $user->assignRole('user');
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Berhasil Dibuat');
        } catch (Exception $err) {
            return ResponseFormatter::error([
                'message' => 'User Gagal Dibuat',
                'error' => $err
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data User Berhasil Diambil');
    }

    public function updateProfile(Request $request)
    {

        $data = $request->all();

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Update');
    }

    public function fetchBook(Request $request)
    {
        $buku  = Book::all();

        return ResponseFormatter::success([
            'message' => 'Data Berhasil Diambil',
            'buku' => $buku
        ], 'Berhasil');
    }

    public function uploadPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error([
                'error' => $validator->errors()
            ], 'Update Photo Fails', 401);
        }

        if ($request->file('file')) {
            $file = $request->file->store('image/user', 'public');

            // Simpan Database

            $user = Auth::user();
            $user->gambar = $file;
            $user->update();

            return ResponseFormatter::success($file, 'File Di Upload');
        }
    }

    public function pinjamBuku(Request $request)
    {

        $curent = Carbon::now();
        $expire = Carbon::now();
        $loan = Loan::create([
            'book_id' => $request->bookId,
            'pinjam' => $curent,
            'kembali' => $expire->addDays(7),
            'user_id' => auth()->user()->id
        ]);
        $book = Book::where('id', $request->bookId)->first();
        $book->stock = $book->stock - 1;
        $book->update();
        return ResponseFormatter::success($loan, 'Berhasil Pinjam Buku');
    }

    public function kembali(Request $request)
    {
        $return = ReturnBook::create([
            'book_id' => $request->bookId,
            'loan_id' => $request->id,
            'tglKembali' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ]);

        return ResponseFormatter::success($return, 'Berhasil Checkout');
    }

    public function returnBook(Request $request)
    {
        $data = ReturnBook::where('user_id', auth()->user()->id)->with(['book'])->get();

        return ResponseFormatter::success($data, 'Data Berhasil Diambil');
    }

    public function telat(Request $request)
    {
        $tanggal = Carbon::today();
        $telat = DB::table('loans')->where('user_id', auth()->user()->id)->where('kembali', '<=', $tanggal)->get();

        return ResponseFormatter::success($telat, 'Data Berhasil Diambil');
    }

    public function jumlahKembali(Request $request)
    {
        $kembali = History::where('user_id', auth()->user()->id)->count();
        return ResponseFormatter::success($kembali, 'Data Berhasil Di Ambil');
    }

    public function jumlahPinjaman(Request $reqquest)
    {
        $tanggal = Carbon::today();
        $waktu = Loan::where('user_id', auth()->user()->id)->where('kembali', '>', $tanggal)->count();

        return ResponseFormatter::success($waktu, 'Data Berhasil Diambil');
    }

    public function pinjaman(Request $request)
    {
        $loans = Loan::where('user_id', auth()->user()->id)->get();
        return ResponseFormatter::success($loans, 'Data Berhasil Diambil');
    }
}
