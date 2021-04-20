<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 2; $i++) {
            Question::create([

                'type' => $i,
                'statement' => 'statement' . $i,       
                'rightanswer' =>  $i,       
                
               
            ]);
        }
    }
}
