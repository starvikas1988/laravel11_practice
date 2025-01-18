<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //manually creating
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //global way,mutiple seeder can be called at once in the array
        $this->call([
            // Userseeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,
            // CategorySeeder::class,
            // OrderSeeder::class,
              AddressSeeder::class,
        ]);
    }
}
