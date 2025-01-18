<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Address::factory()->count(10)->create();
        // DB::table('addresses')->insert([
        //     [
        //         'user_id'=>144,
        //         'city' => 'New York',
        //         'state' => 'New York',
        //         'country' => 'USA',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 143, // Ensure this user exists
        //         'city' => 'Los Angeles',
        //         'state' => 'California',
        //         'country' => 'USA',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 142, // Ensure this user exists
        //         'city' => 'Los Angeles',
        //         'state' => 'California',
        //         'country' => 'USA',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 141, // Ensure this user exists
        //         'city' => 'London',
        //         'state' => 'England',
        //         'country' => 'United Kingdom',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
