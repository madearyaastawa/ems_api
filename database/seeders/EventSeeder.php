<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            ['organizer_id' => 2, 'category_id' => 1, 'title' => 'Event HMJTI 2027', 'event_datetime' => '2027-01-01 09:30:00', 'quota' => 100, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}