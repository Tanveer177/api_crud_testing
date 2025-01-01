<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();
        return response()->json(["participant" => $participants], 200);
        // $participants = Participant::all();
        // return $participants;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:5',
        ]);
        Participant::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
        return response()->json([
            'Status' => 'Participant Successfully Saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id )
    {
        $participant = Participant::find($id);

        if (!  $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
        }

        return $participant;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:5',
        ]);
        $participant = Participant::find($id);

        if (!  $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
        }
       $participant->update([
    'name' => $name,
    'email' => $email,
    'phone' => $phone
    ]);
    return response()->json([
        'Status' => 'Participant Successfully Updated'
        ], 200);
    }
    public function destroy(string $id)
    {
        //
        $participant = Participant::find($id);
        if (!  $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
            }
            $participant->delete();
            return response()->json([
                'Status' => 'Participant Successfully Deleted'
                ], 200);
                
    }
}
