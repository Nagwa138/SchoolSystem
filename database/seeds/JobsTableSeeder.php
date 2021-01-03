<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_parent = App\Job::create([
            'name' => 'parent',
        ]);

        $job_student = App\Job::create([
            'name' => 'student',
        ]);


        $job_employee = App\Job::create([
            'name' => 'employee',
        ]);
    }
}
