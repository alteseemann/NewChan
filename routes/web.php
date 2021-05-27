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

Route::get('/',function (){return view('welcome');})->name('welcome');

Route::get('/test',[\App\Http\Controllers\TestController::class,'test'])->name('test');//для тестов ajax

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/logout',[\App\Http\Controllers\LogoutController::class,'logout'])->name('logout');


route::get('/desks/{desk_id}',[\App\Http\Controllers\DeskController::class,'index'])
    ->middleware(\App\Http\Middleware\CheckDesk::class)
    ->name('enter_desk');//вход на доску
route::post('/desks/desk/show',[\App\Http\Controllers\DeskController::class,'show']);//отобразить содержимое доски




route::get('/desks/{desk_id}/threads/{thread_id}',[\App\Http\Controllers\ThreadController::class,'index'])
    ->middleware(\App\Http\Middleware\CheckThread::class)
    ->name('enter_thread');

