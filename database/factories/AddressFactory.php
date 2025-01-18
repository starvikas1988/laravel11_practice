<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Address::class;
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'city'=>$this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
