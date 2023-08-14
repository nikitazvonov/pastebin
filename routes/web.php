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

Route::get('/', [PasteController::class, 'index']);

Route::post('/pastes', [PasteController::class, 'store']);

Route::get('/pastes/{hash}', [PasteController::class, 'show']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'create']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::get('/users/{name}', [UserController::class, 'show']);
