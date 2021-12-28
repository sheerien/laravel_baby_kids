<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSliderController;

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

//admin group
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');
    //Faq Route group
    Route::group(['prefix' => 'faq'], function () {
        Route::get('/', [AdminFaqController::class, 'index'])->name('faqs');
        Route::get('/create', [AdminFaqController::class, 'create'])->name('faq.create');
        Route::post('/store', [AdminFaqController::class, 'store'])->name('faq.store');
        Route::delete('/delete', [AdminFaqController::class, 'destroy'])->name('faq.delete');
        Route::get('/edit/{faqId}', [AdminFaqController::class, 'edit'])->name('faq.edit');
        Route::put('/update', [AdminFaqController::class, 'update'])->name('faq.update');
    });
    //Slider Route group
    Route::group(['prefix'=> 'slider'], function (){
        Route::get('/create', [AdminSliderController::class , 'create'])->name('slider.create');
        Route::post('/store', [AdminSliderController::class , 'store'])->name('slider.store');
    });
});