<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Carbon\Carbon;
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

        return view('admin.consultation.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date|after:now',
        ]);

        $consultation = Consultation::create([
            'user_id' => Auth::id(),
            'topic' => $request->topic,
            'description' => $request->description,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return redirect()->route('consultation.index')->with('success', 'Consultation created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->scheduled_at = Carbon::parse($consultation->scheduled_at);

        return view('admin.consultation.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);
    
        $consultation = Consultation::findOrFail($id);
    
        $consultation->update([
            'topic' => $request->topic,
            'description' => $request->description,
            'scheduled_at' => $request->scheduled_at,
        ]);
    
        return redirect()->route('consultation.index')->with('success', 'Consultation updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    // app/Http/Controllers/ConsultationController.php

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);

        $consultation->delete();

        return redirect()->route('consultation.index')->with('success', 'Consultation deleted successfully.');
    }

}