<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;



class TwoFactorController extends Controller
{

  public function index(Request $request)
  {
    // return $request->all();
    // return Inertia::render('Auth/OtpCode');
    return Inertia::render('Auth/OtpCode', [
      'data' => $request->input('data'),
    ]);
  }


  public function create()
  {
    //
  }


  public function store(Request $request)
  {

    // dd(1);

    $user = User::where('id', $request->id)->first();
    // dd($user->otp_code);
    if ($request->phone == $user->otp_code) {
      // check idล่าสุด
      // Auth::login($user);
      return redirect()->route('dashboard');
    } else {
      // dd(2);
      return redirect()->back()->withErrors(['otp_code' => 'test']);
    }

  }

  public function show(string $id)
  {
    //
  }


  public function edit(string $id)
  {
    //
  }


  public function update(Request $request, string $id)
  {
    //
  }


  public function destroy(string $id)
  {
    //
  }
}