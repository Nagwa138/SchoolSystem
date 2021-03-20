<?php

use Illuminate\Database\Seeder;

class ModifyTypeNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //parent

        $father_first_name = App\ModifyTypeName::create([
            'name' => 'Father First Name' ,
            'form_name' => 'father_first_name',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $father_middle_name = App\ModifyTypeName::create([
            'name' => 'Father Middle Name' ,
            'form_name' => 'father_middle_name',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $father_last_name = App\ModifyTypeName::create([
            'name' => 'Father Last Name' ,
            'form_name' => 'father_last_name',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $email = App\ModifyTypeName::create([
            'name' => 'Email' ,
            'form_name' => 'email',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $father_phone_number = App\ModifyTypeName::create([
            'name' => 'Father Phone Number' ,
            'form_name' => 'father_phone_number',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $father_picture = App\ModifyTypeName::create([
            'name' => 'Father Picture' ,
            'form_name' => 'father_picture',
            'modify_type_id' => 2,
            'job_id' => 1,
        ]);

        $father_identify_card = App\ModifyTypeName::create([
            'name' => 'Father Identify Card' ,
            'form_name' => 'father_identify_card',
            'modify_type_id' => 2,
            'job_id' => 1,
        ]);


        $other = App\ModifyTypeName::create([
            'name' => 'Other' ,
            'form_name' => 'other',
            'modify_type_id' => 2,
            'job_id' => 1,
        ]);


        //student


        $first_name = App\ModifyTypeName::create([
            'name' => 'Student First Name' ,
            'form_name' => 'first_name',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $middle_name = App\ModifyTypeName::create([
            'name' => 'Student Middle Name' ,
            'form_name' => 'middle_name',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $last_name = App\ModifyTypeName::create([
            'name' => 'Student Last Name' ,
            'form_name' => 'last_name',
            'modify_type_id' => 1,
            'job_id' => 2,
        ]);

        $email = App\ModifyTypeName::create([
            'name' => 'Email' ,
            'form_name' => 'email',
            'modify_type_id' => 1,
            'job_id' => 1,
        ]);

        $gender = App\ModifyTypeName::create([
            'name' => 'Gender' ,
            'form_name' => 'gender',
            'modify_type_id' => 1,
            'job_id' => 2,
        ]);


        $religion = App\ModifyTypeName::create([
            'name' => 'Religion' ,
            'form_name' => 'religion',
            'modify_type_id' => 1,
            'job_id' => 2,
        ]);


        $date_of_birthday = App\ModifyTypeName::create([
            'name' => 'Date Of Birthday' ,
            'form_name' => 'date_of_birthday',
            'modify_type_id' => 1,
            'job_id' => 2,
        ]);

        $level = App\ModifyTypeName::create([
            'name' => 'Level' ,
            'form_name' => 'level',
            'modify_type_id' => 1,
            'job_id' => 2,
        ]);

        $student_picture = App\ModifyTypeName::create([
            'name' => 'Student Picture' ,
            'form_name' => 'student_picture',
            'modify_type_id' => 2,
            'job_id' => 2,
        ]);

        $birth_certificate = App\ModifyTypeName::create([
            'name' => 'Birth Certificate' ,
            'form_name' => 'birth_certificate',
            'modify_type_id' => 2,
            'job_id' => 2,
        ]);

        $student_other = App\ModifyTypeName::create([
            'name' => 'Student Other' ,
            'form_name' => 'student_other',
            'modify_type_id' => 2,
            'job_id' => 2,
        ]);


        //teacher




        //employee
    }
}
