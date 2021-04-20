<?php

namespace Database\Seeders;

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
            TeamLeader::create([

                'name' => 'teamleader' . $i,
                'email' =>'teamleader'. $i.'@mail.com',
                'password' => '1234',
             
            ]);
        }
    }
}
