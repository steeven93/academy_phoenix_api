<?php

namespace Database\Seeders;

use App\Models\PlanSubscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSubcriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanSubscription::create([
            'name'              =>  'Free',
            'slug'              =>  'free',
            'description'       =>  '',
            'price'             =>  '0',
            'stripe_name'       =>  'free',
            'stripe_id'         =>  'price_1LEftuKKfq5wF2Tol1YsaGi4',
            'abbreviation'      =>  '/free',
            'guid'              =>  '54f0b1c2-187f-4ed4-a4ef-cf95df74c8e0'
        ]);

        PlanSubscription::create([
            'name'              =>  'Basic',
            'slug'              =>  'basic',
            'description'       =>  '',
            'price'             =>  '9.99',
            'stripe_name'       =>  'basic',
            'stripe_id'         =>  'price_1LEfurKKfq5wF2ToAHjyTpmu',
            'abbreviation'      =>  '/basic',
            'guid'              =>  'b4cb2b1f-284f-4415-87c3-d2eb63ae0118'
        ]);
    }
}
