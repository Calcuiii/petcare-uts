<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BookingController extends Controller
{
    protected $client;
    protected $bookingServiceUrl;
    protected $groomingServiceUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->bookingServiceUrl = config('services.petcare.booking_service');
        $this->groomingServiceUrl = config('services.petcare.grooming_service');
    }

    public function history(Request $request)
    {
        // Ambil user_id dari session, sementara hardcode 1
        $userId = session('user_id', 1);

        // Ambil histori booking dari BookingService
        try {
            $response = $this->client->get("{$this->bookingServiceUrl}/api/bookings/history/{$userId}");
            $responseData = json_decode($response->getBody(), true);
            $bookings = $responseData['data'] ?? $responseData;
        } catch (RequestException $e) {
            $bookings = [];
        }

        // Enrich setiap booking dengan data grooming
        $groomingCache = []; // cache biar tidak hit API berkali-kali untuk grooming yang sama

        foreach ($bookings as &$booking) {
            $groomingId = $booking['grooming_id'];

            if (!isset($groomingCache[$groomingId])) {
                try {
                    $groomRes = $this->client->get("{$this->groomingServiceUrl}/api/groomings/{$groomingId}");
                    $groomData = json_decode($groomRes->getBody(), true);
                    $groomingCache[$groomingId] = $groomData['data'] ?? $groomData;
                } catch (RequestException $e) {
                    $groomingCache[$groomingId] = null;
                }
            }

            $booking['grooming'] = $groomingCache[$groomingId];
        }

        return view('booking.history', compact('bookings'));
    }
}