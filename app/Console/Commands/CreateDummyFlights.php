<?php

namespace App\Console\Commands;

use App\Models\Airport;
use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateDummyFlights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-dummy-flights';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates dummy flights';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $airports = Airport::all(['id']);

        foreach ($airports as $originAirport) {
            foreach ($airports as $destinationAirport) {
                if ($originAirport->id != $destinationAirport->id) {
                    $time = Carbon::now();
                    $time->setHour(6);

                    for ($i=0; $i < 60; $i++) {
                        for ($j=0; $j < 5; $j++) { 
                            Flight::insert([
                                'origin_airport_id' => $originAirport->id,
                                'destination_airport_id' => $destinationAirport->id,
                                'departure_time' => $time,
                                'arrival_time' => $time->copy()->addHours(1),
                                'seats' => rand(100, 200),
                                'ticket_price' => rand(100, 200),
                            ]);
                            $time->addHours(2);
                        }
                        $time->addDay();
                    }
                }
            }
        }

        return Command::SUCCESS;
    }
}
