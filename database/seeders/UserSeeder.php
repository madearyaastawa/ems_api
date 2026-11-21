<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'root',
            'password' => 'root',
            'email' => 'root@ems.com',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'hmjti',
            'password' => 'hmjti',
            'email' => 'hmjti@ems.com',
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'Karmila',
            'password' => 'karmila',
            'email' => 'karmila@ems.com',
            'role_id' => 3,
        ]);
    }
}
