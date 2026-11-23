<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,ticket_id',
            'checkced_in_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $attendance = Attendance::create([
            'ticket_id' => $request->ticket_id,
            'checkced_in_at' => $request->checked_in_at,
        ]);

        return response()->json($attendance);
    }

    public function show(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    public function update(Request $request, string $id)
    {
        $attendance = Attendance::findOrFail($id);

        $request->validate([
            'ticket_id' => 'required|exists:tickets,ticket_id',
            'checkced_in_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $attendance->update([
            'ticket_id' => $request->ticket_id,
            'checkced_in_at' => $request->checked_in_at,
        ]);

        return response()->json($attendance);
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        if ($attendance != null) {
            $attendance->delete();
            return response()->json([
                'message' => 'Attendance deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Attendance not found'
        ], 404);
    }
}
