<?php

namespace Database\Seeders;

use App\Models\Jobs;
use App\Models\Skills;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jobs::factory(5)->create()->each(function($job){
            $job->skills()->attach(Skills::inRandomOrder()->limit(3)->get());
        });
    }
}
