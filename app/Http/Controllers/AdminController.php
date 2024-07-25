<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'unhashed_password' => $request->password,

        ]);

        return response()->json($admin, 201);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $admin = Admin::find($request->id);

        if (!$admin) {
            return response()->json([
                'message' => 'Admin นี่ ไม่มี'
            ], 404);
        }

        return response()->json($admin);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:admins,id',
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:admins,email,' . $request->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $admin = Admin::findOrFail($request->id);

        if ($request->has('name')) {
            $admin->name = $request->name;
        }

        if ($request->has('email')) {
            $admin->email = $request->email;
        }

        $admin->save();

        return response()->json($admin);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        if (!$id) {
            return response()->json(['message' => 'User ID is required']);
        }

        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['message' => 'User not found']);
        }

        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted success',
            'deleted_id' => $id
        ]);
    }
    public function updateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:admins,id',
            'status' => 'required|string|in:active,unactive',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $admin = Admin::findOrFail($request->id);

        $admin->status = $request->status;
        $admin->save();

        return response()->json($admin);
    }
    public function setPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:admins,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $admin = Admin::find($request->id);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin not found.'
            ], 404);
        }

        $admin->password = Hash::make($request->password);
        $admin->unhashed_password = $request->password;
        $admin->save();

        return response()->json([
            'success' => true,
            'message' => 'Password has been set successfully.'
        ], 200);
    }
}
