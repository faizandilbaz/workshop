<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            Company::create([

                'name' => 'company' . $i,
                'email' =>'company'. $i.'@mail.com',
                'password' => '1234',
               
            ]);
        }
    }
}
