<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessGroomingBooking implements ShouldQueue
{
    use Queueable;

    protected $bookingData;

    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

    public function handle(): void
    {
        Log::info('Grooming booking processed', $this->bookingData);
    }
}