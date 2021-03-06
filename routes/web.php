<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminActivityController;

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

Route::get('/',[HomeController::class, 'index'])->name('index');


Route::get('/admin/login', [AdminAuthController::class , 'loginPage'])->name('admin.loginPage');
Route::post('/admin/login', [AdminAuthController::class , 'login'])->name('admin.login');
//admin group
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    Route::post('/logout', [AdminAuthController::class , 'logout'])->name('logout');

    //Faq Route group
    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/', [AdminFaqController::class, 'index'])->name('all');
        Route::get('/create', [AdminFaqController::class, 'create'])->name('create');
        Route::post('/store', [AdminFaqController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminFaqController::class, 'destroy'])->name('delete');
        Route::get('/edit/{faqId}', [AdminFaqController::class, 'edit'])->name('edit');
        Route::put('/update', [AdminFaqController::class, 'update'])->name('update');
    });

    //Slider Route group
    Route::group(['prefix'=> 'slider', 'as'=>'slider.'], function (){
        Route::get('/', [AdminSliderController::class, 'index'])->name('all');
        Route::get('/create', [AdminSliderController::class , 'create'])->name('create');
        Route::post('/store', [AdminSliderController::class , 'store'])->name('store');
        Route::delete('/delete', [AdminSliderController::class, 'destroy'])->name('delete');
        Route::get('/edit/{sliderId}', [AdminSliderController::class, 'edit'])->name('edit');
        Route::put('/update', [AdminSliderController::class, 'update'])->name('update');
    });

    // Activity Route group
    Route::group(['prefix' => 'activity', 'as' => 'activity.'], function () {
        Route::get('/', [AdminActivityController::class, 'index'])->name('all');
        Route::get('/create', [AdminActivityController::class , 'create'])->name('create');
        Route::post('/store', [AdminActivityController::class , 'store'])->name('store');
        Route::delete('/delete', [AdminActivityController::class, 'destroy'])->name('delete');
        Route::get('/edit/{activityId}', [AdminActivityController::class, 'edit'])->name('edit');
        Route::put('/update', [AdminActivityController::class, 'update'])->name('update');
    });
});