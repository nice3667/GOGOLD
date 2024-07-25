<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::all();

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
        $package->update($request->addDescriptions());
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

        $package = Package::with(['description'])->find($request->input('id'));

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

        $package->delete();
        return response()->json(null, 204);
    }
}
