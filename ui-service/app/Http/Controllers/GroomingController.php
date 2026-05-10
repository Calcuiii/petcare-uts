<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GroomingController extends Controller
{
    protected $groomingServiceUrl;

    public function __construct()
    {
        $this->groomingServiceUrl = 'http://127.0.0.1:8000';
    }

    public function index()
    {
        try {
            $response = Http::get("{$this->groomingServiceUrl}/api/groomings");

            $groomings = $response->json()['data'] ?? [];
        } catch (\Exception $e) {
            $groomings = [];
        }

        return view('grooming.index', compact('groomings'));
    }
}