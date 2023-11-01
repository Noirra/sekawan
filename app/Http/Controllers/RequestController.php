<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestController extends Controller
{
    public function store (Request $request) {
        $data = Http::get('https://dummyjson.com/products');
        $jsonData = $data->json();
        dump($jsonData);
    }

    // public function store(Request $request): RedirectResponse
    // {
    // $name = $request->input('name', 'Indro Adi');
    // return redirect('/nama')->with('nama', $name);
    // }
}
