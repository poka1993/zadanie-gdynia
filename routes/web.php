<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValuesController;

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


Route::get('/', [ValuesController::class, 'showValues'])->name('showValues');
Route::post('/exchange/values', [ValuesController::class, 'exchangeValues'])->name('exchangeValues');
