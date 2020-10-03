<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Login

Route::get('admin/login', [AdminController::class, 'returnViewLogin'])->name('admin.login');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('test-md', function(){
    return "Kiểm tra thành công!";
} )->middleware('admin');


