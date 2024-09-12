<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;






class UserController extends Controller
{

  public function index()
  {
    return Inertia::render('User/Index', [
      'canLogin' => app('router')->has('login'),
      'canRegister' => app('router')->has('register'),
      'laravelVersion' => Application::VERSION,
      'phpVersion' => PHP_VERSION,
    ]);
  }

  public function update(Request $request)
  {

    $user = User::findOrFail($request->id);

    // Validate the request data
    $request->validate([
      'id' => 'required|integer|exists:users,id',
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,',
      'phone' => 'required|string|max:15',

    ]);


    $user->update($request->all());

    return response()->json(['message' => 'User updated success', 'user' => $user], 200);
  }

  public function updateBankAccountInfo(Request $request): JsonResponse
  {
    // Validate the incoming request data
    $request->validate([
      'id' => 'required|integer|exists:users,id',
      'bank_account_name' => 'required|string',
      'bank_name' => 'required|string',
      'bank_account_number' => 'required|string',
    ]);

    try {
      // Find the user by ID from the request body
      $user = User::findOrFail($request->id);

      // Update the user's bank account information
      $user->bank_account_name = $request->bank_account_name;
      $user->bank_name = $request->bank_name;
      $user->bank_account_number = $request->bank_account_number;
      $user->save();

      return response()->json([
        'message' => 'Bank account updated successfully',
        'data' => $user
      ], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'message' => 'User not found'
      ], 404);
    }
  }

  public function updateStatus(Request $request): JsonResponse
  {
    Log::info('Request data:', $request->all());


    $request->validate([
      'id' => 'required|integer|exists:users,id',
      'status' => 'required|in:active,unactive',
    ]);

    $user = User::find($request->id);

    if (!$user) {
      return response()->json([
        'message' => 'User not found'
      ], 404);
    }

    $user->status = $request->status;
    $user->save();

    return response()->json([
      'message' => 'Status updated success',
      'status' => $user->status
    ]);
  }
  public function destroy(Request $request)
  {
    $id = $request->input('id');

    if (!$id) {
      return response()->json(['message' => 'User ID is required']);
    }

    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'User not found']);
    }

    $user->delete();

    return response()->json([
      'message' => 'User deleted success',
      'deleted_id' => $id
    ]);
  }

  public function getUserById(Request $request)
  {
    $request->validate([
      'id' => 'required|integer',
    ]);

    $user = User::find($request->id);

    if (!$user) {
      return response()->json([
        'message' => 'User นี่ ไม่มี'
      ], 404);
    }

    return response()->json($user);
  }

  public function getAllUsers()
  {
    $users = User::all();

    return response()->json($users);
  }
}
