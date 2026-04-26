<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // GET /bookings
    public function index()
    {
        return response()->json(Booking::all(), 200);
    }

    // GET /bookings/history/{userId}  ← dipanggil oleh UserService
    public function historyByUser($userId)
    {
        $bookings = Booking::where('user_id', $userId)->get();
        return response()->json($bookings, 200);
    }

    // ⭐ POST /bookings  ← CONSUMER: panggil UserService + GroomingService
    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|integer',
            'grooming_id'  => 'required|integer',
            'pet_name'     => 'required|string',
            'pet_type'     => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $client = new \GuzzleHttp\Client();

        // Validasi user ke UserService
        try {
            $userRes = $client->get("http://localhost:8001/users/{$request->user_id}");
            $user = json_decode($userRes->getBody(), true);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User not found in UserService'], 404);
        }

        // Validasi grooming ke GroomingService
        try {
            $groomRes = $client->get("http://localhost:8002/groomings/{$request->grooming_id}");
            $grooming = json_decode($groomRes->getBody(), true);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Grooming service not found'], 404);
        }

        // Simpan booking
        $booking = Booking::create($request->all());

        return response()->json([
            'message'  => 'Booking created successfully',
            'booking'  => $booking,
            'user'     => $user,
            'grooming' => $grooming,
        ], 201);
    }
}
