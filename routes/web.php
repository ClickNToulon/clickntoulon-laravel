<?php

use App\Http\Controllers\UserController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Application;
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
    if (Auth::user()) {
        return Inertia::render('Welcome', [
            'roles' => Auth::user()->roles,
            'canLogin' => Route::has('login'),
        ]);
    } else {
        return Inertia::render('Welcome', [
            'roles' => [],
            'canLogin' => Route::has('login'),
        ]);
    }
});

Route::get('/admin', function () {
    return Inertia::render('Admin', [
        'avatar' => Auth::user()->avatar,
        'users' => User::all()
    ]);
})->name('admin')->middleware(['auth', 'verified']);

Route::resource('/admin/users', UserController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
