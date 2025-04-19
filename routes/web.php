<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\CommonController;

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
Route::any('/get-col/{table}/{show?}', [CommonController::class, 'getColumn'])->name('getColumn');
Route::get('/download/{dir?}/{fileName?}', [CommonController::class, 'downloadFile'])->name('download_file');
Route::get('/files/{filename}/{folder}/', [CommonController::class, 'getImage'])->name('show-file');

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('task_list');
    Route::get('/add','add')->name('task_add');
});
//user
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user_list');
    Route::get('/user-add','add')->name('user_add');
});
Route::controller(DesignationController::class)->group(function () {
    Route::get('/designation-list', 'index')->name('desig_list');
    Route::get('/designation-add','add')->name('desig_add');
});