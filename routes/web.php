<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SecAuth;

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

Route::get('/', function () {
    return view('Registro');
});

Route::get('/Login', function () {
    return view('Registro');
});

Route::get('/Datos', function () {
    return view('Datos');
});

Route::get('dashboard', [SecAuth::class, 'dashboard']); 
Route::get('/login', [SecAuth::class, 'index'])->name('login');
Route::post('custom-login', [SecAuth::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [SecAuth::class, 'registration'])->name('register-user');
Route::post('custom-registration', [SecAuth::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [SecAuth::class, 'signOut'])->name('signout');
