<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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
        'products' => Product::with('type', 'shop', 'prices')->latest()->paginate(12),
    ]);
})->name('home');

Route::get('/admin', function () {
    return Inertia::render('Dashboard', [
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

Route::resource('/boutiques', ShopController::class)
    ->only(['index', 'show']);

Route::get('/boutiques/{id}/timetable', [TimetableController::class, 'create']);

Route::patch('/boutiques/{id}/timetable', [TimetableController::class, 'update']);

Route::put('/boutiques/{id}/timetable', [TimetableController::class, 'update']);

Route::delete('/boutiques/{id}/timetable', [TimetableController::class, 'destroy']);

Route::get('/search', [ProductController::class, 'search'])
    ->name('search');

Route::get('/help', [HelpController::class, 'index'])
    ->name('help');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/panier', [BasketController::class, 'index'])
		->name('basket.index');

	Route::post('/panier/ajouter', [BasketController::class, 'addProduct'])
		->name('basket.addProduct');

	Route::delete('/panier/supprimer', [BasketController::class, 'removeProduct'])
		->name('basket.removeProduct');

	Route::post('/panier/modifier', [BasketController::class, 'updateProduct'])
		->name('basket.updateProduct');

	Route::post('/panier/checkout', [BasketController::class, 'checkout'])
		->name('basket.checkout');
});

Route::middleware('auth')->group(function () {
    Route::get('/mon-compte', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/mon-compte', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/mon-compte', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::get('/mon-compte/commandes', [ProfileController::class, 'orders'])->name('profile.orders');
});

Route::get('/employee', function () {
	return Inertia::render('Employee', [
		'guard' => Auth()->user(),
	]);
})->name('employee.home')->middleware(['auth:employee', 'verified']);

require __DIR__.'/auth.php';
