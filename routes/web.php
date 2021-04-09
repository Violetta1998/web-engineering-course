<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
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
    return view('index');
});

Route::get('contacts',function(){
    return view('contacts');
})->name('contacts');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::resource('subjects', SubjectController::class)->middleware(['auth']);
Route::resource('subjects.tasks', TaskController::class)->shallow()->middleware(['auth']);
