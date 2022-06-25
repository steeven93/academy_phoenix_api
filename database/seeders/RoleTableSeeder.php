<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            'name'  =>  'CLIENT_CUSTOMER',
            'description'   =>  'this is a customer - can do customer something'
        ]);
    }
}
