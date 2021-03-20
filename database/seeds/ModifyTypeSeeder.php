<?php

use Illuminate\Database\Seeder;

class ModifyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $one = App\ModifyType::create([
            'type' => 'text' ,
        ]);

        $one = App\ModifyType::create([
            'type' => 'file',
        ]);

    }
}
