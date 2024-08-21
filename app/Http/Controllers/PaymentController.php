<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Received Store Request:', $request->all());

        $validator = Validator::make($request->all(), [
            'payment_type' => 'required|string',
            'bank' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'price' => 'required|numeric',
            'transferred_price' => 'required|numeric',
            'transfer_date' => 'required|date',
            'transfer_time' => 'required',
            'reason' => 'nullable|string',
            'proof_of_payment' => 'sometimes|file|mimes:jpeg,png,pdf|max:2048',
            'package_id' => 'required',
            'bank_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();

        // Handle file upload
        if ($request->hasFile('proof_of_payment')) {
            $path = $request->file('proof_of_payment')->store('payments', 'public');
            $validatedData['proof_of_payment_path'] = $path;
        }

        // Save payment details to database
        $payment = Payment::create($validatedData);

        Log::info('Created:', $payment->toArray());

        return response()->json(['success' => true, 'payment' => $payment], 201);
    }

    public function update(Request $request)
    {
        Log::info('Update Request:' . $request);

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'payment_type' => 'sometimes|required|string',
            'bank' => 'sometimes|required|string',
            'account_name' => 'sometimes|required|string',
            'account_number' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'transferred_price' => 'sometimes|required|numeric',
            'transfer_date' => 'sometimes|required|date',
            'transfer_time' => 'sometimes|required',
            'reason' => 'nullable|string',
            'proof_of_payment' => 'sometimes|file|mimes:jpeg,png,pdf|max:2048',
            'package_id' => 'sometimes|required',
            'bank_id' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();


        $payment = Payment::find($validatedData['id']);
        $id = $request->input('id');
        Log::info('ID from Request:', ['id' => $id]);
        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
        }


        if ($request->hasFile('proof_of_payment')) {
            $path = $request->file('proof_of_payment')->store('payments', 'public');
            $validatedData['proof_of_payment_path'] = $path;
        }

        $payment->update($validatedData);

        Log::info('Updated:', $payment->toArray());

        return response()->json(['success' => true, 'payment' => $payment], 200);
    }

}