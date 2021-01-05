<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = App\Models\Role::create(
            [
                'name' => 'superAdmin',
                'display_name' => 'Super Admin',
                'description' => 'This Is for Admins',
            ]
        );
        $parent = App\Models\Role::create(
            [
                'name' => 'parent',
                'display_name' => 'Parent',
                'description' => 'This Is for Parent',
            ]
        );
        $student = App\Models\Role::create(
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'This Is for Students',
            ]
        );

        $employee = App\Models\Role::create(
            [
                'name' => 'employee',
                'display_name' => 'Employee',
                'description' => 'This Is for Employees',
            ]
        );
    }
}
