<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(FileTypesTableSeeder::class);
        $this->call(StagesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(ModifyTypeSeeder::class);
        $this->call(ModifyTypeNameSeeder::class);
    }
}
