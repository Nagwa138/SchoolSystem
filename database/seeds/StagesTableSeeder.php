<?php

use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $primary = App\Stage::create([
            'name' => 'المرحله الإبتدائه',
        ]);

        $middle = App\Stage::create([
        'name' => 'المرحله الاعداديه',
        ]);

        $secondary = App\Stage::create([
        'name' => 'المرحله الثانويه',
        ]);

    }
}
