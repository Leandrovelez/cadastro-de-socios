<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;

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

Route::get('/', function() {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('partners')->name('partners.')->group(function (){
    Route::get('/', [PartnerController::class, 'index'])->name('index');
    Route::get('/create', [PartnerController::class, 'create'])->name('create');
    Route::post('/store', [PartnerController::class, 'store'])->name('store');
    Route::get('{id}/edit', [PartnerController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [PartnerController::class, 'update'])->name('update');
    Route::get('{id}/delete', [PartnerController::class, 'delete'])->name('delete');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); 

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
