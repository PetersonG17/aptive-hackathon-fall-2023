<?php

use App\Http\Controllers\CustomerNoteController;
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
    return view('customer.note');
});

Route::post('/customer-notes', [CustomerNoteController::class, 'submit'])->name('note.submit');
