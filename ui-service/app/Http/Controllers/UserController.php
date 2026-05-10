<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UserController extends Controller
{
    protected $client;
    protected $userServiceUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->userServiceUrl = config('services.petcare.user_service');
    }

    // Daftar semua user
    public function index()
    {
        try {
            $response = $this->client->get("{$this->userServiceUrl}/api/users"); 
            $responseData = json_decode($response->getBody(), true);
            $users = $responseData['data'] ?? $responseData;
        } catch (RequestException $e) {
            $users = [];
            session()->flash('error', 'UserService tidak dapat diakses.');
        }
        return view('users.index', compact('users'));
    }

    // Detail 1 user + histori bookingnya
    public function show($id)
    {
        try {
            $response = $this->client->get("{$this->userServiceUrl}/api/users/{$id}"); 
            $responseData = json_decode($response->getBody(), true);
            $user = $responseData['data'] ?? $responseData; // ← $user bukan $users
        } catch (RequestException $e) {
            abort(404, 'User tidak ditemukan.');
        }

        // Ambil histori booking dari BookingService
        $bookingServiceUrl = config('services.petcare.booking_service');
        try {
            $bookingRes = $this->client->get("{$bookingServiceUrl}/api/bookings/history/{$id}");
            $bookings = json_decode($bookingRes->getBody(), true);
        } catch (RequestException $e) {
            $bookings = [];
        }

        return view('users.show', compact('user', 'bookings')); 
    }
}