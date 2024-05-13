<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Carbon\Carbon;

class DeleteOldReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete reservations created before the current date';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $twentyFourHoursAgo = Carbon::now()->subHours(24);

      
        Reservation::where('status', 'Due')
                   ->where('created_at', '<', $twentyFourHoursAgo)
                   ->delete();

        $this->info('Reservations with status "due" deleted successfully.');
    }
}

