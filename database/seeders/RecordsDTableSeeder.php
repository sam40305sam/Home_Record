<?php

namespace Database\Seeders;

use App\Models\RecordD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordsDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecordD::truncate();
        RecordD::factory(100)->create();
    }
}
