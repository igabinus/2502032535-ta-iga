<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('authentication/register');
    }
    
    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('fullname'),
            'password' => $request->input('password')
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}