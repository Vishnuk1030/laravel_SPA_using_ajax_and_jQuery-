<?php

use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('list');
// });

Route::get('/',[EmployeeController::class,'index']);

Route::post('save',[EmployeeController::class,'save'])->name('save');

Route::post('fetch-designation',[EmployeeController::class,'fetchDesignation'])->name('fetch.Designation');

Route::post('delete',[EmployeeController::class,'delete'])->name('delete');
