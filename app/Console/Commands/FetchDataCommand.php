<?php

namespace App\Console\Commands;

use App\Models\Pilot;
use App\Models\Starship;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchDataCommand extends Command
{
    protected $signature = 'fetch-data-command';

    protected $description = 'Get pilots and starships records';

    public function handle()
    {
        $this->info("Data fetching started");

        $next = 'https://swapi.dev/api/starships/?page=1';

        do {
            $this->info("Saving data from $next");

            $response = Http::get($next)->object();

            $next = $response->next;

            foreach ($response->results as $starshipData) {
                $starship = Starship::create([
                    'name' => $starshipData->name,
                    'model' => $starshipData->model,
                    'crew' => $starshipData->crew,
                    'cargo_capacity' => floatval($starshipData->cargo_capacity),
                    'max_atmosphering_speed' => $starshipData->max_atmosphering_speed !== 'N/A' ? floatval($starshipData->cargo_capacity) : null,
                ]);

                foreach ($starshipData->pilots as $pilotUrl) {
                    $response = Http::get($pilotUrl)->object();

                    $pilot = Pilot::whereName($response->name)->first();
                    $pilot ?: $pilot = Pilot::create(['name' => $response->name, 'height' => $response->height]);

                    $starship->pilots()->attach($pilot->id);
                }
            }
        } while($next);

        $this->info("Data fetching ended");
    }
}
