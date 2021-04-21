<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamLeader;
use Illuminate\Database\Seeder;

class TeamLeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            Team::create([

                'name' => 'team' . $i,
                'email' =>'team'. $i.'@mail.com',
                'password' => '1234',
             
            ]);
        }
    }
}
