<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return response()->json($registrations);
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
            'status' => 'nullable|string',
        ]);

        $registration = Registration::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);

        return response()->json($registration);
    }

    public function show(string $id)
    {
        $registration = Registration::findOrFail($id);
        return response()->json($registration);
    }

    public function update(Request $request, string $id)
    {
        $registration = Registration::findOrFail($id);

        $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
            'status' => 'nullable|string',
        ]);

        $registration->update([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);

        return response()->json($registration);
    }

    public function destroy(string $id)
    {
        $registration = Registration::find($id);
        if ($registration != null) {
            $registration->delete();
            return response()->json([
                'message' => 'Registration deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Registration not found'
        ], 404);
    }
}
