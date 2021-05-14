<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke()
    {
        $attr = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::whereEmail(request('email'))->first();

        if ($user) {
            if (Hash::check(request('password'), $user->password)) {
                Auth::login($user);
                return redirect()->intended('/');
            } else {
                return back()->with('error', 'Password Anda Salah');
            }
        } else {
            return back()->with('error', 'Email Anda Salah');
        }
    }

    public function index()
    {
        return view('Auth.Login');
    }
}
