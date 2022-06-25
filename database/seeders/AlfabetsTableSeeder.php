<?php

namespace Database\Seeders;

use App\Models\Alfabet;
use App\Models\AlfabetValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlfabetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alfabet::create([
            'name' => 'Italiano',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AlfabetValue::create([
            'value_f'           =>  "1",
            'value_e'           =>  "1",
            'value_m'           =>  "1",
            'char'              => 'A',
            'alfabet_id'        =>  "1",
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        AlfabetValue::create(
           [ 'value_f'          =>  "2",
            'value_e'           =>  "2",
            'value_m'           =>  "2",
            'char'              => 'B',
            'alfabet_id'        => "1",
            'created_at'        => now(),
            'updated_at'        => now()]
        );

        AlfabetValue::create([
            'value_f'         =>  "3",
            'value_e'         =>  "3",
            'value_m'         =>  "3",
            'char'          => 'C',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "4",
            'value_e'         =>  "4",
            'value_m'         =>  "4",
            'char'          => 'D',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "5",
            'value_e'         =>  "5",
            'value_m'         =>  "5",
            'char'          => 'E',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "6",
            'value_e'         =>  "6",
            'value_m'         =>  "6",
            'char'          => 'F',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "7",
            'value_e'         =>  "7",
            'value_m'         =>  "7",
            'char'          => 'G',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "8",
            'value_e'         =>  "8",
            'value_m'         =>  "8",
            'char'          => 'H',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "9",
            'value_e'         =>  "9",
            'value_m'         =>  "9",
            'char'          => 'I',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "1",
            'value_e'         =>  "10",
            'value_m'         =>  "10",
            'char'          => 'J',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "2",
            'value_e'         =>  "11",
            'value_m'         =>  "20",
            'char'          => 'K',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "3",
            'value_e'         =>  "12",
            'value_m'         =>  "30",
            'char'          => 'L',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "4",
            'value_e'         =>  "13",
            'value_m'         =>  "40",
            'char'          => 'M',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "5",
            'value_e'         =>  "14",
            'value_m'         =>  "50",
            'char'          => 'N',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "6",
            'value_e'         =>  "15",
            'value_m'         =>  "60",
            'char'          => 'O',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "7",
            'value_e'         =>  "16",
            'value_m'         =>  "70",
            'char'          => 'P',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "8",
            'value_e'         =>  "17",
            'value_m'         =>  "80",
            'char'          => 'Q',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "9",
            'value_e'         =>  "18",
            'value_m'         =>  "90",
            'char'          => 'R',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);


        AlfabetValue::create([
            'value_f'         =>  "1",
            'value_e'         =>  "19",
            'value_m'         =>  "100",
            'char'          => 'S',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
        AlfabetValue::create([
            'value_f'         =>  "2",
            'value_e'         =>  "20",
            'value_m'         =>  "200",
            'char'          => 'T',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
        AlfabetValue::create([
            'value_f'         =>  "3",
            'value_e'         =>  "21",
            'value_m'         =>  "300",
            'char'          => 'U',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "4",
            'value_e'         =>  "22",
            'value_m'         =>  "400",
            'char'          => 'V',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "5",
            'value_e'         =>  "23",
            'value_m'         =>  "500",
            'char'          => 'W',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "6",
            'value_e'         =>  "24",
            'value_m'         =>  "600",
            'char'          => 'X',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "7",
            'value_e'         =>  "25",
            'value_m'         =>  "700",
            'char'          => 'Y',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        AlfabetValue::create([
            'value_f'         =>  "8",
            'value_e'         =>  "26",
            'value_m'         =>  "800",
            'char'          => 'Z',
            'alfabet_id'    => "1",
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
