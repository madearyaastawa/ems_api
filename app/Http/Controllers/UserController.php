<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|max:100',
            'role_id' => 'required|exists:roles,role_id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);

        return response()->json($user);
    }

    public function show(string $id)
    {
        $user = User::with('role')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        $user = User::with('role')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|max:100',
            'role_id' => 'required|exists:roles,role_id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);

        return response()->json($user);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'User not found'
        ], 404);
    }
}
