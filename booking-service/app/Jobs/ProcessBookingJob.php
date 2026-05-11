<?php

namespace App\Jobs;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessBookingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function handle()
    {
        $client = new \GuzzleHttp\Client();

        try {
            $client->get("http://user-service:8001/api/users/{$this->booking->user_id}");

            $client->get("http://grooming-service:8000/api/groomings/{$this->booking->grooming_id}");

            $this->booking->update(['status' => 'confirmed']);

        } catch (\Exception $e) {
            $this->booking->update(['status' => 'failed']);
        }
    }
}
