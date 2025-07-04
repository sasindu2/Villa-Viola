<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Admin\FormDataController;


Route::get('/', function () {
    return view('website.index');
})->name('landing');

Route::post('/submit-form', [FormController::class, 'store'])->name('form.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});




Route::prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard.index'))->name('admin.dashboard.index');
    Route::get('/form-submissions', [FormDataController::class, 'index'])->name('admin.form.index');
});




Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar','it'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
});
