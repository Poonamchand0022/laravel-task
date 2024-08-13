<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::all();

        return response()->json([
            'consultations' => $consultations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $consultation = Consultation::create([
            'user_id' => Auth::id(),
            'topic' => $request->topic,
            'description' => $request->description,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return response()->json([
            'message' => 'Consultation created successfully.',
            'consultation' => $consultation
        ], 201);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $consultation = Consultation::findOrFail($id);
    
        $consultation->update([
            'topic' => $request->topic,
            'description' => $request->description,
            'scheduled_at' => $request->scheduled_at,
        ]);
    
        return response()->json([
            'message' => 'Consultation updated successfully.',
            'consultation' => $consultation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);

        $consultation->delete();

        return response()->json([
            'message' => 'Consultation deleted successfully.'
        ]);
    }
}
