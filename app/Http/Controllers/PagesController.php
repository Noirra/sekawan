<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PagesController extends Controller
{
    public function beranda() {
        return view('pages.beranda');
    }

    public function loginPage() {
        return view('public.login');
    }

    public function dashboardAdmin () {
        return view('admin.dashboard');
    }
    public function create_penerbit () {
        return view('pages.create_penerbit');
    }

    public function penerbit()
    {
        $data = Penerbit::readPenerbit();
        return view('pages.penerbit')->with('penerbit', $data);
    }

    public function update_penerbit ($id) {
        $penerbit = Penerbit::readPenerbitById($id);
        return view('pages.update_penerbit')->with('penerbit', $penerbit);
    }

    public function register() {
        return view('pages.register');
    }
}
