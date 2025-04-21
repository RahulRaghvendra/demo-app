<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/create-admin', function () {
    // Check if admin user already exists
    if (User::where('email', 'admin@admin.com')->exists()) {
        return 'Admin user already exists.';
    }

    // Create the admin user
    User::create([
        'user_name'      => 'admin',
        'type'           => 'a',
        'email'          => 'admin@admin.com',
        'password'       => Hash::make('12345678'),
        'designation_id' => 1,
        'status'        => 1,
    ]);

    return 'Admin user created successfully. You can now log in with email:admin@admin.com and password:12345678';
});
//this will get us all the columns of a table
Route::any('/get-col/{table}/{show?}', [CommonController::class, 'getColumn'])->name('getColumn');
//this will download the files
Route::get('/download/{dir?}/{fileName?}', [CommonController::class, 'downloadFile'])->name('download_file');
Route::get('/files/{filename}/{folder}/', [CommonController::class, 'getImage'])->name('show-file');

Route::controller(LoginController::class)->group(function () {
    Route::any('/', 'index')->middleware('redirect_if_authenticated');
    Route::any('/login', 'index')->name('login')->middleware('redirect_if_authenticated');
    Route::post('/login_post',  'login_post')->name('login_post');
    Route::get('/logout',  'logout')->name('logout'); 
    Route::get('/password/{id}',  'password')->name('password');
     Route::post('/change_pass',  'change_password')->name('change_pwd');
});

Route::middleware('isAuth')->group(
    function () {

Route::controller(TaskController::class)->prefix('task')->group(function () {
    Route::get('/', 'index')->name('task_list');
    Route::get('/add','add')->name('task_add')->middleware('permission:1011');
    Route::get('/edit/{id?}','edit')->name('task_edit')->middleware('permission:1012');
    Route::get('/delete/{id?}','delete')->name('task_delete')->middleware('permission:1013');
    Route::post('/store','store')->name('task_store');
    Route::get('/view/{id?}','view')->name('task_view')->middleware('permission:1014');
});
//user
Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/index', 'index')->name('user_list')->middleware('permission:1025');
    Route::get('/add','add')->name('user_add')->middleware('permission:1021');
    Route::get('/edit/{id?}','edit')->name('user_edit')->middleware('permission:1022');
    Route::post('/store','store')->name('user_store');
    Route::get('/delete/{id?}','delete')->name('user_delete')->middleware('permission:1023');

});
Route::controller(DesignationController::class)->prefix('designation')->group(function () {
    Route::get('/designation-list', 'index')->name('desig_list')->middleware('permission:1035');
    Route::get('/designation-add','add')->name('desig_add')->middleware('permission:1031');
    Route::get('/designation-edit/{id?}','edit')->name('desig_edit')->middleware('permission:1032');
    Route::post('/designation-store','store')->name('desig_store');
    Route::get('/designation-delete/{id?}','delete')->name('desig_delete')->middleware('permission:1033');
});

}
);