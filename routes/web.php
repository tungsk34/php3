<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



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
    return view('welcome');
});
Route::get('/', function () {
   return view('welcome', ['message' =>session('message')]);
});
Route::get('/movies', function () {
    return view('movies');
})
->middleware('age.check');
// Route dành cho Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'index']);
});

// Route dành cho Nhân viên
Route::group(['middleware' => ['auth', 'role:nhanvien']], function () {
    Route::get('/orders', [OrderController::class, 'index']);
});

// Route dành cho Khách hàng
Route::group(['middleware' => ['auth', 'role:khachhang']], function () {
    Route::get('/profile', [ProfileController::class, 'show']);
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

