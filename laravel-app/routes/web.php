<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/admin','admin/dashboard' )->name('admin');
// Route::view('/bladetemplate','admin/bladeTemplate' );
// Route::get('/bladetemplate',function (){
//     return view('admin/bladeTemplate', ['name' => 'Aayushi']); 
// });
Route::get('/bladetemplate',function (){
    return view('admin/bladeTemplate', ['data' => ['Aayushi',"Laravel Developer"]]); 
});
Route::get('/viewallbooks',[App\Http\Controllers\BooksController::class, 'index']);
