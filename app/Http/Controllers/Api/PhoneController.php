<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhoneResource;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return PhoneResource::collection(Phone::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = $request->model;
        $user_id = $request->user_id;
        $descriptions = $request->descriptions;
        $request->validate([
            'model' => 'required',
            'user_id' => 'required',
            'descriptions' => 'required',
        ]);
        Phone::create([
            'model' => $model,
            'user_id' => $user_id,
            'descriptions' => $descriptions,
        ]);
        return response()->json([
            'Status' => 'Phone Successfully Saved'
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_id = Phone::with('user_id')->findOrFail($id);
        if (! $user_id) {
            return response()->json(['error' => 'user_id Not Found'], 404);
        }
        return new PhoneResource($user_id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
