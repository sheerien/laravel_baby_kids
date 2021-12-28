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
//admin-home
Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.index');

//Faq Routes
Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('faq.create');
Route::post('/faq/store', [AdminFaqController::class, 'store'])->name('faq.store');
Route::get('/faqs', [AdminFaqController::class, 'index'])->name('faqs');
Route::delete('/faqs/delete', [AdminFaqController::class, 'destroy'])->name('faq.delete');
Route::get('/faqs/edit/{faqId}', [AdminFaqController::class, 'edit'])->name('faq.edit');
Route::put('/faqs/update', [AdminFaqController::class, 'update'])->name('faq.update');

//Slider Routes
Route::get('/slider/create', [AdminSliderController::class , 'create'])->name('slider.create');
Route::post('/slider/store', [AdminSliderController::class , 'store'])->name('slider.store');
