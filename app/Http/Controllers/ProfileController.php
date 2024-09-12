<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
	/**
	 * Display the user's profile form.
	 */
	public function edit(Request $request): Response
	{
		return Inertia::render('Profile/Edit', [
			'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
			'status' => session('status'),
		]);
	}

	/**
	 * Update the user's profile information.
	 */
	public function update(ProfileUpdateRequest $request): RedirectResponse
	{
		$request->user()->fill($request->validated());

		if ($request->user()->isDirty('phone')) {
			$request->user()->email_verified_at = null;
		}

		$request->user()->save();

		return Redirect::route('profile.edit');
	}

	/**
	 * Delete the user's account.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$request->validate([
			'password' => ['required', 'current_password'],
		]);

		$user = $request->user();

		Auth::logout();

		$user->delete();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return Redirect::to('/');
	}

	public function createTest(Request $request)
	{
		Log::info($request);
		return 'สมัครเสร็จแล้ว ไปกันต่อ';
	}
	public function updateProfile(Request $request)
	{
		// Validate the request
		$request->validate([
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'email' => 'required|email',
			'bank_name' => 'nullable|string|max:255',
			'bank_account_name' => 'nullable|string|max:20',
			'bank_account_number' => 'nullable|string|max:20',
			'password' => 'nullable|min:8|confirmed',
		]);

		// Update user profile in the database
		$user = auth()->user();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		if ($request->password) {
			$user->password = bcrypt($request->password);
		}
		$user->save();

		return response()->json(['success' => true, 'message' => 'Profile updated successfully']);
	}
}
