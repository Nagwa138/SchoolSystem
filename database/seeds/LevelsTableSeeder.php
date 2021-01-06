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
            'name' => 'الصف الاول   -  Level One',
            'stage_id' => 1 ,
        ]);

        $two = App\Level::create([
            'name' => 'الصف الثاني   -  Level Two',
            'stage_id' => 1 ,
        ]);

        $three = App\Level::create([
            'name' => 'الصف الثالث   -   Level Three',
            'stage_id' => 1 ,
        ]);

        $four = App\Level::create([
            'name' =>'الصف الرابع   -  Level Four',
            'stage_id' => 1 ,
        ]);

        $five = App\Level::create([
            'name' => 'الصف الخامس   -  Level Five',
            'stage_id' => 1 ,
        ]);

        $six = App\Level::create([
            'name' =>  'الصف السادس   -   Level Six ',
            'stage_id' => 1 ,
        ]);

        $one_pro = App\Level::create([
            'name' => 'الصف الاول   -  Level One',
            'stage_id' => 2 ,
        ]);

        $two_pro = App\Level::create([
            'name' => 'الصف الثاني   -  Level Two',
            'stage_id' => 2 ,
        ]);

        $three_pro = App\Level::create([
            'name' =>  'الصف الثالث   -   Level Three',
            'stage_id' => 2 ,
        ]);


        $one_sec = App\Level::create([
            'name' =>'الصف الاول   -  Level One',
            'stage_id' => 3 ,
        ]);

        $two_sec = App\Level::create([
            'name' => 'الصف الثاني   -  Level Two',
            'stage_id' => 3 ,
        ]);

        $three_sec = App\Level::create([
            'name' => 'الصف الثالث   -   Level Three',
            'stage_id' => 3 ,
        ]);

    }
}
