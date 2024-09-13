<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class ConfirmablePasswordController extends Controller
{
	/**
	 * Show the confirm password view.
	 */
	public function show(): Response
	{
		return Inertia::render('auth/ConfirmPassword');
	}

	/**
	 * Confirm the user's password.
	 */
	public function store(Request $request): RedirectResponse
	{

		if (
			!Auth::guard('web')->validate([
				// 'phone' => 'request|string|max:255',
				// 'phone' => $request->user()->phone,
				'password' => $request->password,
			])
		) {
			throw ValidationException::withMessages([
				'password' => __('auth.password'),
			]);
		}

		$request->session()->put('auth.password_confirmed_at', time());

		return redirect()->intended(route('dashboard', absolute: false));
	}
}
