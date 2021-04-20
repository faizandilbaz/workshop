<?php

namespace Database\Seeders;

use App\Models\WorkShop;
use Illuminate\Database\Seeder;

class WorkShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            WorkShop::create([

                'heading' => 'heading' . $i,
                'description' => 'description' . $i,       
                
               
            ]);
        }
    }
}
