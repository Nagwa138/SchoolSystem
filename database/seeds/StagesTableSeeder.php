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
            'name' => 'titles.primary_stage',
        ]);

        $middle = App\Stage::create([
        'name' => 'titles.middle_stage',
        ]);

        $secondary = App\Stage::create([
        'name' => 'titles.secondary_stage',
        ]);

    }
}
