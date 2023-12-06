<?php

use App\Http\Controllers\Aboutuscontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Servicecontroller;
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
    
    Route::get('/service-category', [Servicecontroller::class, 'index'])->name('services');

    Route::get('/create-service', [Servicecontroller::class, 'create'])->name('service');

    Route::post('/service-store', [Servicecontroller::class, 'store'])->name('services');
    
    Route::get('/serviceedit/{id}', [Servicecontroller::class, 'edit'])->name('serviceEditView');

    Route::put('/service-update/{id}', [Servicecontroller::class, 'update'])->name('serviceUpdate');

    Route::delete('/service-delete/{id}', [Servicecontroller::class, 'delete'])->name('servicedelete');
});