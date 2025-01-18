<?php

namespace App\Console;

use App\Jobs\UpdateReservationStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan job untuk dijalankan setiap hari
        $schedule->job(new UpdateReservationStatus)->daily();
    }
    protected $middlewareAliases = [
        // Alias middleware lainnya
        'localization' => \App\Http\Middleware\LocalizationMiddleware::class,
    ];

}
