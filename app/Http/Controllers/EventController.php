<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('organizer')->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'organizer_id' => 'required|exists:users,user_id',
            'category_id' => 'required|exists:categories,category_id',
            'title' => 'required|string|max:100',
            'event_datetime' => 'required|date_format:Y-m-d H:i:s',
            'quota' => 'required|integer',
            'status' => 'nullable|string'
        ]);

        $event = Event::create([
            'organizer_id' => $request->organizer_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'event_datetime' => $request->event_datetime,
            'quota' => $request->quota,
            'status' => $request->status,
        ]);

        return response()->json($event);
    }

    public function show(string $id)
    {
        $event = Event::with('organizer')->findOrFail($id);
        return response()->json($event);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::with('organizer')->findOrFail($id);

        $request->validate([
            'organizer_id' => 'required|exists:users,user_id',
            'category_id' => 'required|exists:categories,category_id',
            'title' => 'required|string|max:100',
            'event_datetime' => 'required|date_format:Y-m-d H:i:s',
            'quota' => 'required|integer',
            'status' => 'nullable|string'
        ]);

        $event->update([
            'organizer_id' => $request->organizer_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'event_datetime' => $request->event_datetime,
            'quota' => $request->quota,
            'status' => $request->status,
        ]);

        return response()->json($event);
    }

    public function destroy(string $id)
    {
        $event = Event::find($id);
        if ($event != null) {
            $event->delete();
            return response()->json([
                'message' => 'Event deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Event not found'
        ], 404);
    }
}
