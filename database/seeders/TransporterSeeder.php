<?php

namespace Database\Seeders;

use App\Models\Transporter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporterSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array_values(json_decode(file_get_contents(__DIR__ . '/airlines.json'), true));

        foreach ($data as $item) {
            (new Transporter([
                'code' => $item['id'],
                'name' => $item['name'],
            ]))->save();
        }
    }
}
