<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmployeeLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class EmployeeAuthenticatedSessionController extends Controller
{
	public function createEmployee()
	{
		return Inertia::render('Auth/LoginEmployee', [
			'canResetPassword' => Route::has('password.request'),
			'status' => session('status'),
		]);
	}

	public function storeEmployee(EmployeeLoginRequest $request)
	{
		$request->authenticate();

		$request->session()->regenerate();

		return redirect()->intended(route('employee.home'));
	}

	public function destroyEmployee(Request $request)
	{
		Auth::guard('employee')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}
