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

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/', [Admin\HomeController::class, 'index'])->name('index');
    // Admin Category Routes
    Route::prefix('/category')->name('category.')->controller(Admin\CategoryController::class)->group( function() {
        
        Route::get('/',                  'index')->name('index');
        Route::get('/show/{id}',        'show')->name('show');
        Route::post('store',            'store')->name('store');
        Route::get('/create',           'create')->name('create');
        Route::get('/edit/{id}',        'edit')->name('edit');
        Route::post('/update/{id}',     'update')->name('update');
        Route::get('/destroy/{id}',     'destroy')->name('destroy');
        Route::get('/destroyimage/{id}', 'destroyimage')->name('destroyImage');
    });
    // Admin Advertisement Routes
    Route::prefix('/advertisement')->name('advertisement.')->controller(Admin\AdvertisementController::class)->group( function() {
        
        Route::get('/',                  'index')->name('index');
        Route::get('/show/{id}',        'show')->name('show');
        Route::post('store',            'store')->name('store');
        Route::get('/create',           'create')->name('create');
        Route::get('/edit/{id}',        'edit')->name('edit');
        Route::post('/update/{id}',     'update')->name('update');
        Route::get('/destroy/{id}',     'destroy')->name('destroy');
        Route::get('/destroyimage/{id}', 'destroyimage')->name('destroyImage');
    });
});