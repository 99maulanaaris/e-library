<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __invoke()
    {
        $password = Hash::make(request('password'));
        $attr = request()->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'noHp' => 'numeric|required',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'nama' => request('nama'),
            'email' => request('email'),
            'noHp' => request('noHp'),
            'password' => $password
        ]);

        $user->assignRole('user');

        return redirect(route('login'))->with('success', 'Berhasil Membuat Account');
    }

    public function index()
    {
        return view('Auth.Register');
    }
}
