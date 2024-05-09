<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[TaskController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/task/add', [TaskController::class, 'create']);
    Route::post('/task/add', [TaskController::class, 'store']);
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']);
    Route::put('/task/update/{id}', [TaskController::class, 'update']);
    Route::delete('/task/delete/{id}', [TaskController::class, 'destroy']);
    Route::put('task/change/{state}/{id}', [TaskController::class, 'change']);
});

require __DIR__.'/auth.php';
