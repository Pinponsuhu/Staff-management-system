<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\RegisterStaff;
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

Route::get('/',[NavigateController::class, 'index']);
Route::get('/report',[NavigateController::class, 'report']);
Route::get('/staffs',[NavigateController::class, 'staff']);
Route::get('/new/staff',[NavigateController::class, 'new_staff']);
Route::post('/new/staff',[NavigateController::class, 'store_staff']);
Route::get('/edit/staff/{id}',[NavigateController::class, 'edit_staff']);
Route::post('/edit/staff/{id}',[NavigateController::class, 'update_staff']);
Route::get('/change/picture/{id}',[NavigateController::class, 'edit_picture']);
Route::post('/change/picture/{id}',[NavigateController::class, 'update_picture']);
Route::get('/staff/details/{id}',[NavigateController::class, 'staff_details']);
Route::post('/add/qualification/{id}',[NavigateController::class, 'add_qualification']);
Route::get('/delete/qualification/{id}',[NavigateController::class, 'delete_qualification']);
Route::get('/task',[NavigateController::class, 'task']);
Route::get('/add/task',[NavigateController::class, 'add_task']);
Route::post('/add/task',[NavigateController::class, 'store_task']);
Route::get('/task/follow/up/{id}',[NavigateController::class, 'follow_up']);
Route::get('/delete/staff/{id}',[NavigateController::class, 'delete_staff']);
Route::get('/task/reply/{id}',[NavigateController::class, 'task_reply']);
Route::post('/task/reply/{id}',[NavigateController::class, 'store_reply']);
Route::get('/login',[LoginController::class, 'login']);
Route::post('/login',[LoginController::class, 'process']);
Route::get('/register',[RegisterStaff::class, 'show']);
Route::get('/logout',[NavigateController::class,'logout']);

Route::redirect('/home','/');