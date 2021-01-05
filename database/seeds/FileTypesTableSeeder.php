<?php

use Illuminate\Database\Seeder;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $father_identify_card = App\Filetype::create([
            'type' => 'labels.father_identify_card'
        ]);

        $father_picture  = App\Filetype::create([
            'type' => 'labels.father_picture'
        ]);

         $student_picture  = App\Filetype::create([
             'type' => 'labels.student_picture'
         ]);

         $addtional_files  = App\Filetype::create([
             'type' => 'labels.addtional_files'
         ]);

        $birth_certificate  = App\Filetype::create([
            'type' => 'labels.birth_certificate'
        ]);

    }
}
