<?php

namespace Database\Seeders;

use App\Models\TimeTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        $Students = [[

            'name'              => 'student1 Admin',
            'email'             => 'student1@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '1',
            'departement_id' => '1',
            'filier_id' => '1',
            'avatar'            => 'img/default-avatar.jpg',
            'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ],
            [

                'name'              => 'student2 Admin',
                'email'             => 'student2@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '1',
                'departement_id' => '1',
                'filier_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],[

                'name'              => 'student3 Admin',
                'email'             => 'student3@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '1',
                'departement_id' => '2',
                'filier_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];


        foreach ($Students as $Student) {
            User::create($Student);
        }
        Schema::enableForeignKeyConstraints();
        //
    }
}
