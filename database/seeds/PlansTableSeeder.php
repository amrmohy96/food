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
            'name' => 'plan one',
            'url' => 'one',
            'description' => 'one',
            'price' => 12,
        ]);
        Plan::create([
            'name' => 'plan two',
            'url' => 'two',
            'description' => 'two',
            'price' => 15,
        ]);
        Plan::create([
            'name' => 'plan three',
            'url' => 'three',
            'description' => 'three',
            'price' => 20,
        ]);
    }
}
