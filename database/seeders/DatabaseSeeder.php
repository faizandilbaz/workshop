<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\TeamLeader;
use App\Models\WorkShop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(TeamLeaderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WorkShopSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(OptionSeeder::class);
    }
}
