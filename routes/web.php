<?php

use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;

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
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

// Change Information
Route::get('/change-infomation', [App\Http\Controllers\HomeController::class, 'changeInfomation'])->name('change-infomation');
Route::post('/update-infomation', [App\Http\Controllers\ProfileController::class, 'updateInfomation'])->name('update-infomation');
Route::post('/update-avatar', [App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('update-avatar');

// Change Password
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');

// method Login
Route::prefix('google')->name('google.')->group(function () {
    Route::get('auth', [GoogleAuthController::class, 'redirect'])->name('auth');
    Route::get('call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('call-back');
});

Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [FacebookAuthController::class, 'redirect'])->name('auth');
    Route::get('call-back', [FacebookAuthController::class, 'callbackFacebook'])->name('call-back');
});

// Role Management
Route::controller(RoleController::class)->prefix('admin/role')->middleware('auth', 'role:Admin')->group(function () {
    Route::get('/index', 'index')->name('role.index');
    Route::post('/add', 'add')->name('role.add');
    Route::post('/delete', 'delete')->name('role.delete');
    Route::post('/update', 'update')->name('role.update');
});

// User Management
Route::controller(UserController::class)->prefix('admin/user')->middleware('auth', 'role:Admin')->group(function () {
    Route::get('/index', 'index')->name('user.index');
    Route::get('/view/{id}', 'view')->name('user.view');
    Route::post('/add', 'add')->name('user.add');
    Route::post('/delete', 'delete')->name('user.delete');
    Route::post('/update/{id}', 'update')->name('user.update');
});

// News Management
Route::controller(NewsController::class)->prefix('admin/news')->middleware('auth', 'role:Admin')->group(function () {
    Route::get('/index', 'index')->name('news.index');
    Route::get('/view/{id?}', 'view')->name('news.view');
    Route::post('/add', 'add')->name('news.add');
    // Route::post('/delete', 'delete')->name('user.delete');
    // Route::post('/update/{id}', 'update')->name('user.update');
});


// Exam Management
Route::controller(ExamController::class)->prefix('admin/exam')->middleware('auth', 'role:Admin')->group(function () {
    Route::get('/index', 'index')->name('exam.index');
    Route::get('/view/{id}', 'view')->name('exam.view');
    Route::post('/import', 'import')->name('exam.import');
    Route::post('/add', 'add')->name('exam.add');
    Route::get('/view-add', 'viewAddExam')->name('exam.view-add');
});

// Route::get('/send-email', function () {
//     $mailData = [
//         "name" => "Hello Fend",
//         "dob" => "25/12/2001"
//     ];

//     Mail::to("nhabao706@gmail.com")->send(new TestEmail($mailData));

//     dd("Email sent successfully");
// });