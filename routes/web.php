<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'],function(){
 Route::get('/empleado', [EmpleadoController::class, 'index'])->name('home');
  Route::post('/empleado',[EmpleadoController::class,'store']);
  Route::get('/empleado/{empleado}/edit',[EmpleadoController::class,'edit']);
  Route::delete('/empleado/{empleado}',[EmpleadoController::class,'destroy']);


});




