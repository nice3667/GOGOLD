<?php

namespace App\Http\Controllers\Api;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class BankAccountController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,unactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/bank_accounts', 'public');
        }

        $bankAccount = BankAccount::create([
            'account_name' => $request->account_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
            'image_path' => $imagePath,
            'status' => $request->status
        ]);

        return response()->json($bankAccount, 201);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:bank_accounts,id',
            'account_name' => 'sometimes|required|string|max:255',
            'bank_name' => 'sometimes|required|string|max:255',
            'account_number' => 'sometimes|required|string|max:255',
            'account_type' => 'sometimes|required|string|max:255',
            'image_path' => 'sometimes|nullable|string|max:255',
            'status' => 'sometimes|required|in:active,inactive',
        ]);

        $bankAccount = BankAccount::findOrFail($validated['id']);

        $bankAccount->update($validated);

        return response()->json(['message' => 'Bank account updated successfully', 'bank_account' => $bankAccount]);
    }
    public function getAllBank()
    {
        $bankAccount = BankAccount::all();

        return response()->json($bankAccount);
    }

    public function getBankById(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $bankAccount = BankAccount::find($request->id);

        if (!$bankAccount) {
            return response()->json([
                'message' => 'User นี่ ไม่มี'
            ], 404);
        }

        return response()->json($bankAccount);
    }

}