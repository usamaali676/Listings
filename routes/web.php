<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessCategoriesController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Models\BusinessCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "cache Clear";
});
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function(){
//     return view('FrontEnd.index')->name('front');
// });
Route::get('/', [DashboardController::class,  'index'])->name('front');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/listing', [DashboardController::class, 'listing'])->name('listing');
Route::get('search', [DashboardController::class, 'search'])->name('search');
Route::get('category/{slug?}', [DashboardController::class, 'SingleCategory'])->name('singcat');
Route::get('/show/{slug?}', [BusinessController::class, 'single'])->name('business.single');
Route::get('/single-state/{name?}', [DashboardController::class, 'cities'])->name('cities');
Route::get('/test', [DashboardController::class, 'test'])->name('test');
Route::get('/filter', [DashboardController::class, 'filter'])->name('filter');

Auth::routes([
    'register' => false,
]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(BusinessCategoriesController::class)->prefix('bcategory')->as('bc.')->middleware('auth')->group(function(){
Route::get('/index',  'index')->name('index');
Route::get('/add', 'create')->name('add');
Route::post('/store', 'store')->name('store');
Route::get('/edit/{id?}',  'edit')->name('edit');
Route::post('/update',  'update')->name('update');
Route::get('/delete/{id?}',  'destroy')->name('delete');
});


Route::controller(BusinessController::class)->prefix('business')->as('business.')->middleware('auth')->group(function(){
Route::get('/index', 'index')->name('index');
Route::get('/add', 'create')->name('add');
Route::post('/store', 'store')->name('store');
Route::get('/edit/{id?}', 'edit')->name('edit');
Route::post('/update/{id?}', 'update')->name('update');
Route::get('/delete/{id?}', 'destroy')->name('delete');
});

Route::controller(UserController::class)->prefix('user')->as('user.')->middleware('auth')->group(function(){
Route::get('index', 'index')->name('index');
Route::get('add', 'create')->name('add');
Route::post('store', 'store')->name('store');
Route::get('edit/{id?}', 'edit')->name('edit');
Route::post('updare', 'update')->name('update');
Route::get('delete/{id?}', 'destroy')->name('delete');
});


Route::controller(RoleController::class)->prefix('role')->as('role.')->middleware('auth')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/add', 'create')->name('add');
    Route::post('/store', 'store')->name('store');
    Route::get('edit/{id?}',  'edit')->name('edit');
    Route::post('update',  'update')->name('update');
    Route::get('delete/{id?}',  'destroy')->name('delete');
    });

    Route::get('/deletearea/{id?}', [BusinessController::class, 'destroyarea'])->name('area.destroy');;

    Route::controller(StateController::class)->prefix('state')->as('state.')->middleware('auth')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });
