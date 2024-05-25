<?php

use App\Http\Controllers\AuditDataController;
use App\Http\Controllers\AuditLoadController;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', function (){
    if (Auth::check()){
        return redirect()->route('audits');
    }
    return view('home.home');
})->name('login');

Route::get('/logout', function (){
    Auth::logout();
    return redirect(\route('home'));
})->name('logout');

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function (){
    Route::get('/audits', [AuditsController::class, 'audits'])->name('audits');
    Route::get('/audits/{year}', [AuditsController::class, 'year'])->name('audits.year');
    Route::get('/audits/{year}/{contractor}', [AuditsController::class, 'contractor'])->name('audits.year.contractor');

    Route::get('/audits/{year}/{contractor}/{audit}', [AuditDataController::class, 'index'])->name('audits.year.contractor.audit');
    Route::post('/audits/{year}/{contractor}/{audit}', [AuditDataController::class, 'save'])->name('audits.data.save');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('add-audit', [AuditLoadController::class, 'index'])->name('add-audit');
    Route::post('add-audit', [AuditLoadController::class, 'load'])->name('load-audit');
});

