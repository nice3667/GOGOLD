<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        Log::info(json_encode($request));
        $ValidateUser = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => ['required', Rules\Password::defaults()],

        ]);
        if ($ValidateUser->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Validation error',
                'errors' => $ValidateUser->errors()
            ], 401);

        }
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'unhashed_password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User create suc',
        ], 200);
    }


}
