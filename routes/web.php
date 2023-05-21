<?php

use App\Http\Controllers\NotesController;
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
    return view('Principal.principal');
});
Route::get('/notes', [NotesController::class,'index'])->name('notes');
Route::post('/store',[NotesController::class, 'store'])->name('store');

Route::get('/showhowdata', [NotesController::class,'showhowdata'])->name('showhowdata');
Route::post('/update',[NotesController::class, 'update'])->name('update');

Route::delete('/delete',[NotesController::class, 'delete'])->name('delete');
