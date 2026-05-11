<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Jobs\ProcessBookingJob;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json(Booking::all(), 200);
    }

    public function historyByUser($userId)
    {
        $bookings = Booking::where('user_id', $userId)->get();
        return response()->json($bookings, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|integer',
            'grooming_id'  => 'required|integer',
            'pet_name'     => 'required|string',
            'pet_type'     => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $booking = Booking::create([
            'user_id'      => $request->user_id,
            'grooming_id'  => $request->grooming_id,
            'pet_name'     => $request->pet_name,
            'pet_type'     => $request->pet_type,
            'booking_date' => $request->booking_date,
            'status'       => 'pending',
        ]);

        ProcessBookingJob::dispatch($booking);

        return response()->json([
            'message' => 'Booking sedang diproses',
            'booking' => $booking,
        ], 201);
    }
}
