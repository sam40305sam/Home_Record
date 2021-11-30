<?php

namespace Database\Seeders;

use App\Models\Record;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::truncate();
        $max = 2500;
        foreach (range(1, $max) as $number) {
            Record::create([
                               'temperature' => rand(0, 100),
                               'humidity' => rand(0, 100),
                               'time' => Carbon::now()->subHours(($max - $number)),
                           ]);
        }
    }
}
