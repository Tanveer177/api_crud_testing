<?php

namespace App\Http\Controllers\Api;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParticipantResource;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo 'here is participant';
        // return ParticipantResource::collection(Participant::with('Categoriesmany'));
         // $participants = Participant::all();
        // return response()->json(["participant" => $participants], 200);
        // $participants = Participant::all();
        // return $participants;
        return ParticipantResource::collection(Participant::all());
    }

    public function store(Request $request)
    {
        $participant_name = $request->participant_name;
        $user_id = $request->user_id;
        $categroy_id = $request->categroy_id;
        $details = $request->details;
        $request->validate([
            'participant_name' => 'required',
            'user_id' => 'required',
            'categroy_id' => 'required',
            'details' => 'required',
        ]);
        Participant::create([
            'participant_name' => $participant_name,
            'user_id' => $user_id,
            'categroy_id' => $categroy_id,
            'details' => $details,
        ]);
        return response()->json([
            'Status' => 'Participant Successfully Saved'
        ], 200);
    }
    public function show(string $id)
    {
        // $participant = Participant::find($id);
        $participant = Participant::with('user' , 'categroy')->findOrFail($id);
        if (! $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
        }
        return new ParticipantResource($participant);
    }

     public function update(Request $request, string $id)
    {
        $participant_name = $request->participant_name;
        $user_id = $request->user_id;
        $categroy_id = $request->categroy_id;
        $details = $request->details;
        $request->validate([
            'participant_name' => 'required',
            'user_id' => 'required',
            'categroy_id' => 'required',
            'details' => 'required',
        ]);
        $participant = Participant::find($id);

        if (! $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
        }
        $participant->update([
            'participant_name' => $participant_name,
            'user_id' => $user_id,
            'categroy_id' => $categroy_id,
            'details' => $details,
        ]);
        return response()->json([
            'Status' => 'Participant Successfully Updated'
        ], 200);
    }
    public function destroy(string $id)
    {
        $participant = Participant::find($id);
        if (! $participant) {
            return response()->json(['error' => 'Participant Not Found'], 404);
        }
        $participant->delete();
        return response()->json([
            'Status' => 'Participant Successfully Deleted'
        ], 200);
    }
}
