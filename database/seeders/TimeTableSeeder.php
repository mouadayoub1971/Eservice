<?php

namespace Database\Seeders;

use App\Models\TimeTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        $times = [[
            'title' =>'cour',
            'day'=>'MONDAY',
            'filier_id' =>'1',
            'start_time'=>'08:00:00',
            'end_time'=>'10:00:00',
            'module_filier_id'=>"1",
            'classe_id'=>"3",

        ],
            [
            'title' =>'cour',
            'filier_id' =>'1',
                'day'=>'WEDNESDAY',
            'start_time'=>'08:00:00',
            'end_time'=>'12:00:00',
            'module_filier_id'=>"2",
                'classe_id'=>"3",

        ]
        ];


        foreach ($times as $time) {
            TimeTable::create($time);
        }

        Schema::enableForeignKeyConstraints();
    }
}
