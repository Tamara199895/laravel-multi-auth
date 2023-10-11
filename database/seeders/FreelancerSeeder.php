<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Freelancer::factory()->count(5)->create();

    }
}
