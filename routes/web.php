<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;

Route::get('view_student', 'StudentController@viewStudent');
Route::post('/create_student', 'StudentController@store');
Route::get('/delete_student/{id}', 'StudentController@delete');
Route::post('/update_student', 'StudentController@update');

Route::get('view_teacher', 'TeacherController@viewTeacher');
Route::post('create_teacher', 'TeacherController@add');
Route::get('/delete_teacher/{id}', 'TeacherController@delete');
Route::post('update_teacher', 'TeacherController@update');
Route::get('/update_teacher', 'TeacherController@edit');

Route::get('view_course', 'CourseController@viewCourse');
Route::post('create_course', 'CourseController@store');
Route::get('delete_course/{id}', 'CourseController@delete');
Route::post('update_course', 'CourseController@update');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/Logout', [LogoutController::class, 'index'])->name('Logout');

Route::get('/Login', [LoginController::class, 'index'])->name('Login');
Route::post('/Login', [LoginController::class, 'store']);


Route::get('/', function () {
    return view('welcome');
});
