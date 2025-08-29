<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
        public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'business' => 'nullable|string',
            'features' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // You can save to DB or log, for example:
         Message::create($validated);

        return response()->json([
            'message' => 'Reservation received successfully!',
            'data' => $validated,
        ]);
    }
}
