<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Kategori;
use App\Models\Buku;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\CheckUserAccess;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('main');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'create'])->name('regis.index');
Route::post('/buat-akun', [RegisterController::class, 'store'])->name('register');

Route::middleware([CheckUserAccess::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dash');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/addkategori', [KategoriController::class, 'add_kategori'])->name('addkategori');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::post('/addbuku', [BukuController::class, 'store'])->name('add_buku');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/addusers', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user_id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user_id}', [UserController::class, 'destroy'])->name('users.delete');

    Route::get('menu', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/delete', [MenuController::class, 'destroy'])->name('menu.delete');

    Route::get('/Jenis_User', [RoleController::class, 'Jenis_User'])->name('JenisUser.index');
    Route::post('/Jenis_User_Store', [RoleController::class, 'Jenis_User_Store'])->name('JenisUser.store');

    Route::get('/email/create', [EmailController::class, 'create'])->name('email.create');
    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    Route::get('/email/inbox', [EmailController::class, 'inbox'])->name('email.inbox');
    Route::get('/email/detail/{id}', [EmailController::class, 'detail'])->name('email.detail');
    Route::post('/email/reply/{id}', [EmailController::class, 'reply'])->name('email.reply');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});


// Route yang hanya dapat diakses oleh admin
Route::middleware([CheckUserAccess::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/addkategori', [KategoriController::class, 'add_kategori'])->name('addkategori');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::post('/addbuku', [BukuController::class, 'store'])->name('add_buku');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');

    Route::get('menu', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/Jenis_User', [RoleController::class, 'Jenis_User'])->name('JenisUser.index');
    Route::post('/Jenis_User_Store', [RoleController::class, 'Jenis_User_Store'])->name('JenisUser.store');

    Route::get('/email/create', [EmailController::class, 'create'])->name('email.create');
    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    Route::get('/email/inbox', [EmailController::class, 'inbox'])->name('email.inbox');
    Route::get('/email/detail/{id}', [EmailController::class, 'detail'])->name('email.detail');
    Route::post('/email/reply/{id}', [EmailController::class, 'reply'])->name('email.reply');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

// Route yang hanya dapat diakses oleh mahasiswa
Route::middleware([CheckUserAccess::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/addkategori', [KategoriController::class, 'add_kategori'])->name('addkategori');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::post('/addbuku', [BukuController::class, 'store'])->name('add_buku');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');

    Route::get('menu', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/Jenis_User', [RoleController::class, 'Jenis_User'])->name('JenisUser.index');
    Route::post('/Jenis_User_Store', [RoleController::class, 'Jenis_User_Store'])->name('JenisUser.store');

    Route::get('/email/create', [EmailController::class, 'create'])->name('email.create');
    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    Route::get('/email/inbox', [EmailController::class, 'inbox'])->name('email.inbox');
    Route::get('/email/detail/{id}', [EmailController::class, 'detail'])->name('email.detail');
    Route::post('/email/reply/{id}', [EmailController::class, 'reply'])->name('email.reply');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route yang hanya dapat diakses oleh dosen
Route::middleware([CheckUserAccess::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/addkategori', [KategoriController::class, 'add_kategori'])->name('addkategori');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::post('/addbuku', [BukuController::class, 'store'])->name('add_buku');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');

    Route::get('menu', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/Jenis_User', [RoleController::class, 'Jenis_User'])->name('JenisUser.index');
    Route::post('/Jenis_User_Store', [RoleController::class, 'Jenis_User_Store'])->name('JenisUser.store');

    Route::get('/email/create', [EmailController::class, 'create'])->name('email.create');
    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    Route::get('/email/inbox', [EmailController::class, 'inbox'])->name('email.inbox');
    Route::get('/email/detail/{id}', [EmailController::class, 'detail'])->name('email.detail');
    Route::post('/email/reply/{id}', [EmailController::class, 'reply'])->name('email.reply');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

