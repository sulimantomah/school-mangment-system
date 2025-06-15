<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\grades\GradeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// ✅ تسجيل الدخول يكون خارج middleware 'auth'
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        // صفحة تسجيل الدخول
        Route::get('/', [LoginController::class, 'create'])->name('login');

        // إرسال معلومات تسجيل الدخول
        Route::prefix('admin')->group(function () {
            Route::post('login', [LoginController::class, 'store'])->name('admin.login.submit');
        });
    }
);

//  باقي المسارات التي تحتاج مصادقة
Route::middleware(['auth:admin'])->prefix(LaravelLocalization::setLocale() . '/admin')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('grades', GradeController::class);
});

