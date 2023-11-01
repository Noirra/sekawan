<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\UserssController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RequestController::class, 'store']);

Route::get('/dashboard', [RoutesController::class, 'Dashboard']);

Route::match(['get', 'post'], '/anggota', function () {
    return 'Hallo, aku m    embuat route anggota dengan beberapa method';
});

Route::redirect('/buku', '/dashboard');

Route::get('/nama', function() {
    $nama = session('nama');
    return 'Halaman nama dengan nama ' . $nama;
});

Route::get('/array', function () {
    return [1, 'Perpustakaan', true];
});

Route::get('/hello', function () {
    return response($content = 'Hallo Laravel')
    ->withHeaders([
    'Content-Type' => 'text/html',
    'X-Header-One' => 'Header Value 1',
    'X-Header-Two' => 'Header Value 2',
    ]);
});

Route::get('/tes', function () {
    return redirect()->action([RoutesController::class, 'Dashboard']);
});

Route::get('/', [RoutesController::class, 'Dashboard']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'postLogin']);

Route::get('/perpustakaan', [RoutesController::class, 'perpustakaan']);
Route::get('/perpustakaan/{buku}', [RoutesController::class, 'perpustakaan']);


// 12/10/2023
Route::get('/beranda', [PagesController::class, 'beranda'])->name('beranda');
Route::get('/login', [PagesController::class, 'loginPage'])->name('login');

Route::get('/admin', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');

// 19 / 10 2023
Route::post('/createpenerbit', [PenerbitController::class, 'create'])->name('action.createpenerbit');

Route::get('/createpenerbit', [PagesController:: class, 'create_penerbit'])->name('create_penerbit');
Route::get('/penerbit', [PagesController:: class, 'penerbit'])->name('penerbit');

Route::get('/update_penerbit/{penerbit_id}', [PagesController::class, 'update_penerbit'])->name('update_penerbit');
Route::patch('/penerbit/{penerbit_id}', [PenerbitController::class, 'update'])->name('penerbit.update');
Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');
Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');
