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
        \App\Models\Role::create([
            'id'    =>  1,
            'name'  =>  'ADMIN',
            'description'   =>  'can do anything'
        ]);
        \App\Models\Role::create([
            'id'    => 2,
            'name'  =>  'EDIT_ONLY',
            'description'   =>  'can view and edit something'
        ]);
        \App\Models\Role::create([
            'id'    => 3,
            'name'  =>  'CUSTOMER',
            'description'   =>  'this is a customer - can do customer something'
        ]);
    }
}