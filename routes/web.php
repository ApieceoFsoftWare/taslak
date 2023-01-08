<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
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
});

Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// _-_-_-_-_-_-_-_-_-_-_-_-_-_-_ Admin Panel Routes _-_-_-_-_-_-_-_-_-_-_-_-_-_-_ \\

Route::get('/admin', [Admin\HomeController::class, 'index'])->name('admin');

// Admin Category Routes
Route::get('/admin/category',           [Admin\CategoryController::class, 'index'])->name('admin_category');
Route::get('/admin/category/show',      [Admin\CategoryController::class, 'show'])->name('admin_category_show');
Route::post('/admin/category/store',    [Admin\CategoryController::class, 'store'])->name('admin_category_store');
Route::get('/admin/category/create',    [Admin\CategoryController::class, 'create'])->name('admin_category_create');
Route::get('/admin/category/edit',      [Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
Route::get('/admin/category/destroy',   [Admin\CategoryController::class, 'destroy'])->name('admin_category_destroy');
 