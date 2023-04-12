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


Route::get('/advertisements/{id?}/{slug?}', [HomeController::class, 'advertisements'])->name('advertisements');
Route::get('/advertisement/{id}',[HomeController::class, 'advertisement'])->name('advertisement');
Route::get('/categoryadvertisements/{id}/{slug}',[HomeController::class, 'categoryadvertisements'])->name('categoryadvertisements');


// _-_-_-_-_-_-_-_-_-_-_-_-_-_-_ Admin Panel Routes _-_-_-_-_-_-_-_-_-_-_-_-_-_-_ \\

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/', [Admin\AdminHomeController::class, 'index'])->name('index');
    
    // Admin Home Pages
    Route::prefix('/home')->name('home.')->controller(Admin\HomeController::class)->group( function() {
        Route::get('/',                         'index')->name('index');
        Route::get('/edit/{id}',                'edit')->name('edit');
        Route::post('/update/{id}',             'update')->name('update');
    });
    
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
        Route::get('/destroyDetailImage/{id}',     'destroyDetailImage')->name('destroyDetailImage');
        Route::get('/destroyListImage/{id}',     'destroyListImage')->name('destroyListImage');
    });
    //Admin Advertisement Image Gallery Routes
    Route::prefix('/image')->name('image.')->controller(Admin\ImageController::class)->group( function() {
        Route::get('/{pid}',                  'index')->name('index');
        Route::get('/create/{pid}',           'create')->name('create');
        Route::post('store/{pid}',            'store')->name('store');
        Route::post('/update/{pid}/{id}',     'update')->name('update');
        Route::get('/destroy/{pid}/{id}',     'destroy')->name('destroy');
       

    });
     //Admin Config Routes
     Route::prefix('/config')->name('config.')->controller(Admin\ConfigController::class)->group( function() {
        Route::get('/',                  'index')->name('index');
        Route::get('/create',           'create')->name('create');
        Route::post('store',            'store')->name('store');
        Route::post('/update',     'update')->name('update');
        Route::get('/destroy',     'destroy')->name('destroy');
    });
});