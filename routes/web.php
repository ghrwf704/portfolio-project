<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController; // HomeControllerをインポートする
use App\Http\Controllers\DashboardController; // DashboardControllerをインポートする
use Illuminate\Support\Facades\Route;

// ウェルカムページをログインページにリダイレクト
Route::get('/', function () {
    return redirect()->route('login');
});

// ダッシュボードのルート設定
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified']) // 認証と検証が必要
    ->name('dashboard');

// ユーザー向けのホームルート
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 認証されたユーザー向けのプロファイル管理ルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 認証関連のルーティングを含む
require __DIR__.'/auth.php';

// これがデフォルトの認証ルート
Auth::routes();

