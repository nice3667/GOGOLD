<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{

	public function create(): Response
	{
		return Inertia::render('auth/Register');
	}


	public function store(Request $request): RedirectResponse
	{
		Log::info('test');

		$validate = $request->validate([
			'phone' => 'required|string|max:255',
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		]);
		Log::info($validate);

		if ($validate) {

			$user = User::create([
				'name' => $request->name,
				'phone' => $request->phone,
				'password' => Hash::make($request->password),
				'unhashed_password' => $request->password,
			]);
			Log::info('test1.2');


			$user->generateCode();
			// event(new Registered($user));
			Log::info('test4');
		} else {
			Log::info('test5');
		}

		return redirect()->route('otp', ['data' => $user->id]);
	}
}
