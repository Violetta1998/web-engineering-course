<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teachercontroller;
use App\Http\Controllers\studentcontroller;
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

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth'])->name('home');

Route::get('/subjects/take', [SubjectController::class, 'take'] )->name('subjects.take');
Route::get('/subjects/{id}/save', [SubjectController::class, 'save'] )->name('subjects.save');

Route::resource('subjects', SubjectController::class)->middleware(['auth']);
Route::resource('subjects.tasks', TaskController::class)->shallow()->middleware(['auth']);

Route::get('/teacher_dashboard', function(){
    return view('teacher.home');
})->middleware(['auth'])->name('teacher_dashboard');

Route::get('/student_dashboard', function(){
    return view('student.home');
})->middleware(['auth'])->name('student_dashboard');

Route::get('/student_index', function(){
    return view('student.index');
})->middleware(['auth'])->name('student_index');
