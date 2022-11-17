<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'roles' => Auth::user() ? Auth::user()->roles->pluck('name') : [],
        'canLogin' => Route::has('login'),
        'products' => Product::with('productType', 'price')->latest()->paginate(3),
    ]);
})->name('home');

Route::get('/admin', function () {
    return Inertia::render('Admin', [
        'avatar' => Auth::user()->avatar,
        'users' => User::all()
    ]);
})->name('admin')->middleware(['auth', 'verified']);

Route::resource('/admin/users', UserController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::delete("/admin/users/ban/{id}", [UserController::class, 'ban'])
    ->name('users.ban')
    ->middleware(['auth', 'verified']);

Route::resource('/produits', ProductController::class)
    ->only(['index', 'show']);

Route::get('/search', [ProductController::class, 'search'])
    ->name('search');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'shops' => Shop::all(),
        'products' => Product::all(),
        'users' => User::all(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
