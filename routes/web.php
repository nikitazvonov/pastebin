<?php

use App\Http\Controllers\PasteController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PasteController::class, 'index'])->name('pastes.index');

Route::post('/pastes', [PasteController::class, 'store'])->name('pastes.store');

Route::get('/pastes/{hash}', [PasteController::class, 'show'])->name('pastes.show');;

Route::get('/login', [UserController::class, 'login'])->name('users.login');;

Route::get('/signup', [UserController::class, 'create'])->name('users.create');;

Route::get('/logout', [UserController::class, 'logout'])->name('users.logout');;

Route::post('/users', [UserController::class, 'store'])->name('users.store');;

Route::post('/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');;

Route::get('/users/{name}', [UserController::class, 'show'])->name('users.show');;
