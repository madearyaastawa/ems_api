<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'registration_id' => 'required|exists:registrations,registration_id',
            'ticket_code' => 'required|string|max:100|unique:tickets',
            'qr_code' => 'nullable|string|max:100',
        ]);

        $ticket = Ticket::create([
            'registration_id' => $request->registration_id,
            'ticket_code' => $request->ticket_code,
            'qr_code' => $request->qr_code,
        ]);

        return response()->json($ticket);
    }

    public function show(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }

    public function update(Request $request, string $id)
    {
        $ticket = Ticket::findOrFail($id);

        $request->validate([
            'registration_id' => 'required|exists:registrations,registration_id',
            'ticket_code' => 'required|string|max:100|unique:tickets',
            'qr_code' => 'nullable|string|max:100',
        ]);

        $ticket->update([
            'registration_id' => $request->registration_id,
            'ticket_code' => $request->ticket_code,
            'qr_code' => $request->qr_code,
        ]);

        return response()->json($ticket);
    }

    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket != null) {
            $ticket->delete();
            return response()->json([
                'message' => 'Ticket deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Ticket not found'
        ], 404);
    }
}
