<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'Alex',
            'description' => 'Alex',
        ]); Profile::create([
        'name' => 'Jone',
        'description' => 'Jone Profile',
    ]);
    }
}
