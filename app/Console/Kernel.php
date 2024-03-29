<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\ScrapSpecializations;
use App\Console\Commands\ScrapTimetable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        ScrapTimetable::class,
        ScrapSpecializations::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command("timetable:all")->hourly();
        $schedule->command("horizon:snapshot")->everyFiveMinutes();
        $schedule->command("queue:flush")->weekly();
        $schedule->command("queue:prune-batches")->weekly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . "/Commands");

        require base_path("routes/console.php");
    }
}
