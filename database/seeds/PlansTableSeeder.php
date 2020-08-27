<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'plan one test',
            'url' => 'plan-one-test',
            'description' => 'plan one test',
            'price' => 12.6,
        ]);
        Plan::create([
            'name' => 'plan two test',
            'url' => 'plan-two-test',
            'description' => 'plan two test',
            'price' => 15.99,
        ]);
        Plan::create([
            'name' => 'plan-three-test',
            'url' => 'plan-three-test',
            'description' => 'three',
            'price' => 20.78,
        ]);
    }
}
