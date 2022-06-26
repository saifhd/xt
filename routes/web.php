<?php

use App\Http\Controllers\Users\PrescriptionController;
use App\Http\Controllers\Users\QuotationController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(PrescriptionController::class)
    ->middleware('auth')
    ->prefix('/prescriptions')
    ->group(function(){
        Route::get('/create','create')->name('prescriptions.create')->middleware('user');
        Route::post('/','store')->name('prescriptions.store')->middleware('user');
        Route::get('/','index')->name('prescriptions.index');
        Route::get('/{id}','show')->name('prescriptions.show');
        Route::put('/chamge-status/{id}','changeStatus')->name('prescriptions.change-status');
    });

Route::controller(QuotationController::class)
    ->middleware(['auth','pharmacy'])
    ->prefix('/quotations')
    ->group(function(){
        Route::post('/','store')->name('quotation.store');
    });

// Route::controller(PrescriptionController::class)
//     ->middleware('auth')
//     ->prefix('pharmacy')
