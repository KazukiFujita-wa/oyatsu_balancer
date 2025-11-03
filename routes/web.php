<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SnackController;

// トップページ: 予算入力画面
Route::get('/', function () {
    return view('index');
})->name('home');

// 結果画面
Route::get('/result', [SnackController::class, 'result'])->name('result');

// シェア画面
Route::get('/share', function () {
    return view('share');
})->name('share');