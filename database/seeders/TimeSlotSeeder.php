<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeSlot::create([
            'start_time' => '08:00',
            'end_time' => '10:00',
            'capacity' => 10
        ]);
        TimeSlot::create([
            'start_time' => '10:00',
            'end_time' => '12:00',
            'capacity' => 10
        ]);
        TimeSlot::create([
            'start_time' => '12:00',
            'end_time' => '14:00',
            'capacity' => 10
        ]);
        TimeSlot::create([
            'start_time' => '14:00',
            'end_time' => '16:00',
            'capacity' => 10
        ]);
        TimeSlot::create([
            'start_time' => '16:00',
            'end_time' => '18:00',
            'capacity' => 10
        ]);
    }
}
