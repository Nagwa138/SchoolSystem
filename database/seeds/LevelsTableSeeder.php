<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $one = App\Level::create([
            'name' => 'titles.one_level',
            'stage_id' => 1 ,
        ]);

        $two = App\Level::create([
            'name' => 'titles.two_level',
            'stage_id' => 1 ,
        ]);

        $three = App\Level::create([
            'name' => 'titles.three_level',
            'stage_id' => 1 ,
        ]);

        $four = App\Level::create([
            'name' => 'titles.four_level',
            'stage_id' => 1 ,
        ]);

        $five = App\Level::create([
            'name' => 'titles.five_level',
            'stage_id' => 1 ,
        ]);

        $six = App\Level::create([
            'name' => 'titles.six_level',
            'stage_id' => 1 ,
        ]);

        $one_pro = App\Level::create([
            'name' =>  'titles.one_level',
            'stage_id' => 2 ,
        ]);

        $two_pro = App\Level::create([
            'name' => 'titles.two_level',
            'stage_id' => 2 ,
        ]);

        $three_pro = App\Level::create([
            'name' =>  'titles.three_level',
            'stage_id' => 2 ,
        ]);


        $one_sec = App\Level::create([
            'name' => 'titles.one_level',
            'stage_id' => 3 ,
        ]);

        $two_sec = App\Level::create([
            'name' => 'titles.two_level',
            'stage_id' => 3 ,
        ]);

        $three_sec = App\Level::create([
            'name' => 'titles.three_level',
            'stage_id' => 3 ,
        ]);

    }
}
