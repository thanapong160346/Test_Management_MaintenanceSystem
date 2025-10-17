<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\AssetMainController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

         // สำหรับครุภัณฑ์
        Route::resource('assets', AssetMainController::class);
        Route::get('/assets', [AssetMainController::class, 'index'])->name('assets.index');
        Route::get('/assets/data', [AssetMainController::class, 'getAssets']);  // รองรับการดึงข้อมูล
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        // สำหรับการจัดการการแจ้งซ่อม
        Route::resource('repairs', RepairController::class);
});


require __DIR__.'/auth.php';
