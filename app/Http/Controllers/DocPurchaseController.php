<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocPurchase; // Make sure to import your model
use Illuminate\Support\Facades\Storage;

class DocPurchaseController extends Controller
{
  public function store(Request $request)
  {
    // Validate the incoming request
    $request->validate([
      'package_id' => 'required|string',
      'price' => 'required|numeric',
      'discount' => 'nullable|string',
      'total_amount_to_be_paid' => 'required|string',
      'payment_channels' => 'required|string',
      'account_number' => 'required|string',
      'bank_name' => 'required|string',
      'account_name' => 'required|string',
      'transfer_money' => 'required|numeric',
      'transfer_date' => 'required|date',
      'transfer_time' => 'required|date_format:H:i',
      'image_path' => 'nullable|file|image|max:2048', // Max size 2MB

    ]);



    // Create a new record in the doc_purchase table
    DocPurchase::create([
      'package_id' => $request->package_id,
      'price' => $request->price,
      'discount' => $request->discount,
      'total_amount_to_be_paid' => $request->total_amount_to_be_paid,
      'payment_channels' => $request->payment_channels,
      'account_number' => $request->account_number,
      'bank_name' => $request->bank_name,
      'account_name' => $request->account_name,
      'transfer_money' => $request->transfer_money,
      'transfer_date' => $request->transfer_date,
      'transfer_time' => $request->transfer_time,
      'image_path' => $request->image_path,

    ]);

    // Return a response
    return response()->json(['message' => 'Purchase successfully'], 201);
  }
}
