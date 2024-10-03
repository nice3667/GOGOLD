<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
  public function index(Request $request)
  {
    $packages = Package::with(['descriptions'])->get();

    return response()->json($packages, 200);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'price' => 'required|numeric',
      'packet_age' => 'required|max:255',
      'is_popular' => 'boolean',
      'descriptions.*' => 'nullable',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $package = Package::create($request->all());
    $package->addDescriptions($request, $package->id);
    return response()->json($package, 201);
  }
  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:packages,id',
      'name' => 'sometimes|required|string|max:255',
      'price' => 'sometimes|required|numeric',
      'packet_age' => 'required|max:255',
      'is_popular' => 'boolean',
      'descriptions.*' => 'nullable',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $package = Package::find($request->input('id'));

    if (!$package) {
      return response()->json(['error' => 'Package not found'], 404);
    }

    $package->update($request->all());
    $package->descriptions()->delete();
    $package->addDescriptions($request, $package->id);
    return response()->json($package, 200);
  }

  public function show(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:packages,id',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $package = Package::with(['descriptions'])->find($request->input('id'));

    return response()->json($package, 200);
  }

  public function destroy(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:packages,id',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $package = Package::find($request->input('id'));

    if (!$package) {
      return response()->json(['error' => 'Package not found'], 404);
    }

    $package->descriptions()->delete();
    $package->delete();
    return response()->json(null, 204);
  }
  public function indexInertia()
  {
    // ดึงข้อมูลสินค้าทั้งหมดพร้อมกับคำอธิบาย
    $packages = Package::with(['descriptions'])->get();

    return Inertia::render('UserMarketProduct-id', ['packages' => $packages]);
  }

  // แสดงหน้ารายละเอียดสินค้า
  public function showInertia($id)
{
    $package = Package::with(['descriptions'])->find($id); // ดึงข้อมูล package พร้อมกับ descriptions

    if (!$package) {
        return Inertia::render('ErrorPage', ['message' => 'ไม่พบรายละเอียดสินค้านี้']);
    }

    return Inertia::render('UserMarketProduct-id', [
        'package' => $package,
        'descriptions' => $package->descriptions,
    ]);
}


}