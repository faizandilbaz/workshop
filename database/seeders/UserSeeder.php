<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            User::create([

                'name' => 'user' . $i,
                'email' =>'user'. $i.'@mail.com',
                'password' => '1234',
                'company_id' => $i,
                'team_id' => $i,
               
            ]);
        }
    }
}
