<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
  public function create(): Response
  {
    return Inertia::render('auth/Login', [
      'canResetPassword' => Route::has('password.request'),
      'status' => session('status'),
    ]);
  }


  public function store(LoginRequest $request): RedirectResponse
  {
    // $credentials = $request->validate([
    //   'phone' => ['required'],
    //   'password' => ['required'],
    // ]);

    // if (Auth::attempt($credentials)) {
    $request->auth();
    $request->session()->regenerate();
    //   $remember = $request->has('remember') ? $request->remember : false;
    //   $user = User::where('phone', $request->phone)->first();
    //   $user = Auth::user();
    // }
    return redirect()->intended('dashboard');

    // return back();

    // return redirect()->intended(route('dashboard', absolute: false));
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
