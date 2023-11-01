<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register (Request $request)
    {
    $id = mt_rand(1000000000000000, 9999999999999999);
    $data = [
    'user_id' => $id,
    'user_nama' => $request->input('nama'),
    'user_alamat' => $request->input('alamat'),
    'user_username' => $request->input('username'),
    'user_email' => $request->input('email'),
    'user_notelp' => $request->input('notelp'),
    'user_password' => bcrypt($request->input('password'))
    ];
    $user = User::register($data);
    if ($user) {
        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput();
    }
    }
}
