<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('pages.about_project');
})->name('about_project');

Route::get('/about/document', function () {
    return view('pages.document');
})->name('about_document');

Route::get('/helpbook', function () {
    return view('pages.helpbook');
})->name('about_helpbook');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/about/reserchers', [AboutController::class, 'reserchers'])->name('about_reserchers');

