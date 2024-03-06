<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array_values(json_decode(file_get_contents(__DIR__ . '/airports.json'), true));

        foreach ($data as $item) {
            (new Airport([
                'icao' => $item['icao'],
                'iata' => $item['iata'],
                'name' => $item['name'],
                'city' => $item['city'],
                'state' => $item['state'],
                'country' => $item['country'],
                'elevation' => $item['elevation'],
                'lat' => $item['lat'],
                'lon' => $item['lon'],
                'timezone' => $item['tz'],
            ]))->save();
        }
    }
}
