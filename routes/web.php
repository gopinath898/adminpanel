<?php

use App\Http\Controllers\Aboutuscontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboardcontroller;
use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });


    Route::get('/adminregister', [DashboardController::class, 'index'])->name('/adminregister');

    Route::get('/registeredit/{id}', [DashboardController::class, 'edit'])->name('/registeredit');
    
    Route::put('/registerupdate/{id}', [DashboardController::class, 'update'])->name('registerupdateuser');
    
    Route::delete('/userdelete/{id}', [DashboardController::class, 'delete'])->name('userdelete');
    
    Route::get('/aboutus', [Aboutuscontroller::class, 'index'])->name('about');
    
    Route::post('/saveaboutus', [Aboutuscontroller::class, 'store'])->name('storeaboutus');
    
    Route::get('/aboutedit/{id}', [Aboutuscontroller::class, 'edit'])->name('aboutEditView');
    Route::put('/aboutedit/{id}', [Aboutuscontroller::class, 'update'])->name('aboutUpdate');

    Route::delete('/aboutDelete/{id}', [Aboutuscontroller::class, 'delete'])->name('aboutDelete');
    
});