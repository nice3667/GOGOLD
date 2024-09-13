<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'phone' => ['required', 'string', 'phone'],
      'password' => ['required', 'string'],
    ];
  }


  public function auth(): void
  {
    $this->ensureIsNotRateLimited();

    if (!Auth::attempt($this->only('phone', 'password'), $this->boolean('remember'))) {
      RateLimiter::hit($this->throttleKey());

      throw ValidationException::withMessages([
        'phone' => trans('auth.failed'),
      ]);
    }

    $user = User::where('phone', $this->input('phone'))->first();
    // $user->generateCode();

    RateLimiter::clear($this->throttleKey());
  }

  public function ensureIsNotRateLimited(): void
  {
    if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
      return;
    }

    event(new Lockout($this));

    $seconds = RateLimiter::availableIn($this->throttleKey());

    throw ValidationException::withMessages([
      'phone' => trans('auth.throttle', [
        'seconds' => $seconds,
        'minutes' => ceil($seconds / 60),
      ]),
    ]);
  }

  /**
   * Get the rate limiting throttle key for the request.
   */
  public function throttleKey(): string
  {
    return Str::transliterate(Str::lower($this->string('phone')) . '|' . $this->ip());
  }
}
