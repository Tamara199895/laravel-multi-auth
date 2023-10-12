<?php

namespace Database\Factories;

use App\Models\Jobs;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs>
 */
class JobsFactory extends Factory
{
    protected $model = Jobs::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random()->customer_id,
            'work_name' => $this->faker->name(),
            'work_description' => $this->faker->sentence(3),
            'status' => 'not_started'
        ];
    }
}
