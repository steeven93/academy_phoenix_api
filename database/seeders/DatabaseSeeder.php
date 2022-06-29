<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RoleTableSeeder::class);
        $this->call(AlfabetsTableSeeder::class);
        $this->call(PlanSubcriptionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(GrillTableSeeder::class);
        $this->call(GrillBoxTableSeeder::class);
        $this->call(TriadTableSeeder::class);
        $this->call(PersonalYearTableSeeder::class);
        $this->call(KarmicLessonTableSeeder::class);
        $this->call(ExpressionNumberTableSeeder::class);
    }
}
