<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BeasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/history', function () {
    return view('history');
})->middleware(['auth', 'verified'])->name('history');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Controller dashboard (beasiswa)
Route::get('/dashboard', [App\Http\Controllers\BeasiswaController::class, 'index'])->name('dashboard');

// Tampilkan halaman login admin
Route::get('/login-admin', function () {
    return view('Admin.Login');
})->name('admin.login');

// Proses login admin
Route::post('/login-admin', function (Request $request) {
    $request->validate([
        'username_admin' => 'required',
        'password' => 'required',
    ]);

    $admin = Admin::where('username_admin', $request->username_admin)->first();

    if ($admin && Hash::check($request->password, $admin->password_admin)) {
        session(['admin_logged_in' => true, 'admin_username' => $admin->username_admin]);
        return redirect('/Form-admin');
    }

    return back()->withErrors(['login' => 'Username atau password salah']);
})->name('admin.login.submit');

// Tampilkan halaman Form-admin hanya jika sudah login sebagai admin
Route::get('/Form-admin', function () {
    if (!session('admin_logged_in')) {
        return redirect('/login-admin')->withErrors(['login' => 'Silakan login dulu']);
    }

    return view('Admin.Form');
})->name('admin.form');

// Route tambahan untuk menyimpan data beasiswa
Route::post('/beasiswa/store', [BeasiswaController::class, 'store'])->name('beasiswa.store');

require __DIR__.'/auth.php';
