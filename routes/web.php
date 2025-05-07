<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BeasiswaController;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    if (!Admin::where('username_admin', 'admin')->exists()) {
        Admin::create([
            'username_admin' => 'admin',
            'password_admin' => Hash::make('admin#123'),
        ]);
    }

    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    if (session('admin_logged_in')) {
        return redirect('/');
    }

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    if (session('admin_logged_in')) {
        return redirect('/');
    }

    Route::get('/history', [HistoryController::class, 'index'])->name('history');
});
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');

Route::middleware('auth')->group(function () {
    if (session('admin_logged_in')) {
        return redirect('/');
    }

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login-admin', function () {
    if (session('admin_logged_in')) {
        return redirect('/form-admin');
    }

    return view('Admin.Login');
})->name('admin.login');

Route::post('/login-admin', function (Request $request) {
    $request->validate([
        'username_admin' => 'required',
        'password' => 'required',
    ]);

    $admin = Admin::where('username_admin', $request->username_admin)->first();

    if ($admin && Hash::check($request->password, $admin->password_admin)) {
        session(['admin_logged_in' => true, 'admin_username' => $admin->username_admin]);

        return redirect('/form-admin');
    }

    return back()->withErrors(['login' => 'Username atau password salah']);
})->name('admin.login.submit');

Route::get('/form-admin', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }

    if (!session('admin_logged_in')) {
        return redirect('/login-admin')->withErrors(['login' => 'Silakan login terlebih dahulu']);
    }

    return view('Admin.Form');
})->name('admin.form');

Route::get('/logout-admin', function () {
    session()->forget('admin_logged_in');
    session()->forget('admin_username');

    return redirect('/login-admin')->with('success', 'Anda berhasil logout');
})->name('admin.logout');

Route::post('/beasiswa/store', [BeasiswaController::class, 'store'])->name('beasiswa.store');

require __DIR__.'/auth.php';
