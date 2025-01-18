<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
            //'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'product_name'=>$this->faker->word(),
            'total_amount'=>$this->faker->randomFloat(2, 10, 500),
        ];
    }
}
