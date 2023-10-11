<?php

namespace Database\Factories;

use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Freelancer>
 */
class FreelancerFactory extends Factory
{
    protected $model = Freelancer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'freelancer_id' => User::where('type', '=', '1')->get()->random()->id,
            'hourly_pay' => rand(10,100),

        ];  
    }
}
