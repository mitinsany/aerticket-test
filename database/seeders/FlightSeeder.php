<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    private $data = [[
        'departure_airport_id' => 25211,
        'arrival_airport_id' => 15739,
        'transporter_id' => 1050,
        'flight_number' => 'W64556',
        'duration' => 100,
        'departure_at' => '2018-07-01 06:30:00'
    ], [
        'departure_airport_id' => 25211,
        'arrival_airport_id' => 15739,
        'transporter_id' => 229,
        'flight_number' => 'PS1234',
        'duration' => 95,
        'departure_at' => '2018-07-01 07:00:00'
    ], [
        'departure_airport_id' => 25211,
        'arrival_airport_id' => 15739,
        'transporter_id' => 1050,
        'flight_number' => 'W64558',
        'duration' => 90,
        'departure_at' => '2018-07-01 15:00:00'
    ], [
        'departure_airport_id' => 25211,
        'arrival_airport_id' => 15739,
        'transporter_id' => 1050,
        'flight_number' => 'TEST-DAY-2',
        'duration' => 100,
        'departure_at' => '2018-07-02 06:30:00'
    ]];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $item) {
            (new Flight($item))->save();
        }
    }
}
