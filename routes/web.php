<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

//Route::resource('/students', StudentController::class)->middleware('verified');
Route::get('/students',[StudentController::class, 'index'])->name('students.ingreso')->middleware('verified'); 
Route::get('/students/create',[StudentController::class, 'create'])->name('students.crear')->middleware('verified'); 
Route::post('/students/add',[StudentController::class, 'store'])->name('students.guardar')->middleware('verified'); 
Route::get('/students/edit/{id}',[StudentController::class, 'edit'])->name('students.edit')->middleware('verified');
Route::get('/students/update/{id}',[StudentController::class, 'update'])->name('students.actualizar')->middleware('verified');
Route::delete('/students/delete/{id}',[StudentController::class, 'destroy'])->name('students.borrar')->middleware('verified');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
