<?php

// UpdateSeats command
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Routes;
use App\Models\Transport;
use Log;

class UpdateSeats extends Command
{
    protected $signature = 'seats:update';
    protected $description = 'Update seats table based on changes in transport table';

    public function handle()
    {
        // Retrieve routes with their associated transport
        $routes = Routes::with('transport')->get();

        foreach ($routes as $route) {
            $transport = $route->transport;

            // Now you can access the transport's properties like capacity
            $capacity = $transport->capacity;
            
            // Get the difference between capacity and existing seats count
            $existingSeatsCount = $route->seats()->count();
            $capacityDifference = $capacity - $existingSeatsCount;

            if ($capacityDifference > 0) {
                // Add new seats if capacity increased
                for ($i = 0; $i < $capacityDifference; $i++) {
                    $route->seats()->create([
                        'status' => 'Available'
                    ]);
                }
            } elseif ($capacityDifference < 0) {
                // Delete excess seats if capacity decreased
                $route->seats()->latest()->take(abs($capacityDifference))->delete();
            }
        }

        $this->info('Seats table updated successfully.');
      
    }
}
