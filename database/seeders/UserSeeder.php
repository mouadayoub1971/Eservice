<?php

namespace Database\Seeders;

use App\Models\classe;
use App\Models\Departement;
use App\Models\Filier;
use App\Models\Module;
use App\Models\Module_filier;
use App\Models\Module_prof;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        // Add the master administrator, user id of 1
        $users = [
<<<<<<< HEAD
            [
                'name'              => 'Super Admin',
                'email'             => 'super@admin.com',
                'password'          => Hash::make('secret'),
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'role_id' => '1',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [

                'name'              => 'mehdi Admin',
                'email'             => 'mehdi@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '3',
                'departement_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
<<<<<<< HEAD
            [

                'name'              => 'mouad Admin',
                'email'             => 'mouad@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '3',
                'departement_id' => '2',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [

                'name'              => '9awad Admin',
                'email'             => '9awad@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '2',
                'departement_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [

                'name'              => 'zamel Admin',
                'email'             => 'zamel@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '2',
                'departement_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [

                'name'              => 'zabi Admin',
                'email'             => 'zabi@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '2',
                'departement_id' => '1',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [

                'name'              => '7liwa Admin',
                'email'             => '7liwa@admin.com',
                'password'          => Hash::make('secret'),
                'role_id' => '2',
                'departement_id' => '2',
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

=======
            // 5 prof
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Ahmed PHP',
            'email'             => 'ahemePHP@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Mohammed JAVA',
            'email'             => 'mohammed@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Hamada Csharp',
            'email'             => 'hamada@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Younes Javascript',
            'email'             => 'younes@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Asmae .NET',
            'email'             => 'asmae@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
            [
            //     'first_name'        => 'Admin',
            //     'last_name'         => 'Istrator',
            'name'              => 'Simo kotlin',
            'email'             => 'simo@admin.com',
            'password'          => Hash::make('secret'),
            'role_id' => '2',
            //     'username'          => '100002',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            ],
=======
            // [
            //     // 'first_name'        => 'Super',
            //     // 'last_name'         => 'Admin',
            //     'name'              => 'Super Admin',
            //     'email'             => 'super@admin.com',
            //     'password'          => Hash::make('secret'),
            //     // 'username'          => '100001',
            //     // 'mobile'            => $faker->phoneNumber,
            //     // 'date_of_birth'     => $faker->date,
            //     // 'avatar'            => 'img/default-avatar.jpg',
            //     // 'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     // 'email_verified_at' => Carbon::now(),
            //     'role_id' => '1',
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'mehdi Admin',
            // 'email'             => 'mehdi@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '3',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // // 5 prof
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Ahmed PHP',
            // 'email'             => 'ahemePHP@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Mohammed JAVA',
            // 'email'             => 'mohammed@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Hamada Csharp',
            // 'email'             => 'hamada@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Younes Javascript',
            // 'email'             => 'younes@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Asmae .NET',
            // 'email'             => 'asmae@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
            // [
            // //     'first_name'        => 'Admin',
            // //     'last_name'         => 'Istrator',
            // 'name'              => 'Simo kotlin',
            // 'email'             => 'simo@admin.com',
            // 'password'          => Hash::make('secret'),
            // 'role_id' => '2',
            // //     'username'          => '100002',
            // //     'mobile'            => $faker->phoneNumber,
            // //     'date_of_birth'     => $faker->date,
            // //     'avatar'            => 'img/default-avatar.jpg',
            // //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            // //     'email_verified_at' => Carbon::now(),
            // //     'created_at'        => Carbon::now(),
            // //     'updated_at'        => Carbon::now(),
            // ],
>>>>>>> e626f1a (the version v.0)
            // [
            //     'first_name'        => 'Manager',
            //     'last_name'         => 'User User',
            //     'name'              => 'Manager',
            //     'email'             => 'manager@manager.com',
            //     'password'          => Hash::make('secret'),
            //     'username'          => '100003',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            // ],
            // [
            //     'first_name'        => 'Executive',
            //     'last_name'         => 'User',
            //     'name'              => 'Executive User',
            //     'email'             => 'executive@executive.com',
            //     'password'          => Hash::make('secret'),
            //     'username'          => '100004',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            // ],
            // [
            //     'first_name'        => 'General',
            //     'last_name'         => 'User',
            //     'name'              => 'General User',
            //     'email'             => 'user@user.com',
            //     'password'          => Hash::make('secret'),
            //     'username'          => '100005',
            //     'mobile'            => $faker->phoneNumber,
            //     'date_of_birth'     => $faker->date,
            //     'avatar'            => 'img/default-avatar.jpg',
            //     'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
            //     'email_verified_at' => Carbon::now(),
            //     'created_at'        => Carbon::now(),
            //     'updated_at'        => Carbon::now(),
            // ],
>>>>>>> e43fc32 (adding prof)
        ];

        $roles = [
            [
                'name' => 'student'
            ],
            [
                'name' => 'professeur'
            ],
            [
                'name' => 'chef_departement'
            ],
            [
                'name' => 'cordinateur_filier'
            ],
        ];





        $departements = [
            [
                'name' => 'depatrement Mathimatique',
                'chef_departement_id' => '1',
            ],
            [
                'name' => 'depatrement phisique',
                'chef_departement_id' => '2',
            ],
            [
                'name' => 'depatrement CP',
                'chef_departement_id' => '2',
            ],
        ];



        $modules = [
            [
                'name' => 'C++',
                'departement_id' => '1'
            ],
            [
                'name' => 'Web 1',
                'departement_id' => '1'
            ],
            [
                'name' => 'theorie de langage',
                'departement_id' => '1'
            ],
            [
                'name' => 'python',
                'departement_id' => '1'
            ],
            [
                'name' => 'machine learning',
                'departement_id' => '1'
            ],
        ];


        $module_filiers = [

            [
                'filier_id' => '1',
                'classe_id' => '3',
                'module_id' => "1",
            ],
            [
                'filier_id' => '1',
                'classe_id' => '3',
                'module_id' => "2",
            ],
            [
                'filier_id' => '1',
                'classe_id' => '3',
                'module_id' => "3",
            ],
            [
                'filier_id' => '2',
                'classe_id' => '6',
                'module_id' => "4",
            ],
            [
                'filier_id' => '2',
                'classe_id' => '6',
                'module_id' => "5",
            ],

        ];
        // 4.5.6
        $module_profs = [
            [
                'prof_id' => '4',
                "module_id" => "1"
            ],
            [
                'prof_id' => '5',
                "module_id" => "2"
            ],
            [
                'prof_id' => '4',
                "module_id" => "3"
            ],
            [
                'prof_id' => '6',
                "module_id" => "4"
            ],
            [
                'prof_id' => '5',
                "module_id" => "5"
            ],
        ];

        $filiers = [
            [
                'name' => 'genie informatique',
                'cordinateur_id' => '2',
                'departement_id' => '1',
            ],
            [
                'name' => 'data',
                'cordinateur_id' => '1',
                'departement_id' => '1',
            ]
        ];
        $classes = [
            [
                'name' => 'CP1',
                'departement_id' => '3'
            ],
            [
                'name' => 'CP2',
                'departement_id' => '3'
            ],
            [
                'name' => 'GI1',
                'filier_id' => '1',
                'departement_id' => '1'
            ],
            [
                'name' => 'GI2',
                'filier_id' => '1',
                'departement_id' => '1'
            ],
            [
                'name' => 'GI3',
                'filier_id' => '1',
                'departement_id' => '1'
            ],
            [
                'name' => 'ID1',
                'filier_id' => '2',
                'departement_id' => '1'
            ],
            [
                'name' => 'ID2',
                'filier_id' => '2',
                'departement_id' => '1'
            ],
            [
                'name' => 'ID3',
                'filier_id' => '2',
                'departement_id' => '1'
            ],
        ];


        foreach ($departements as $departement) {
            $user = Departement::create($departement);
        }
        foreach ($classes as $classe) {
            $user = classe::create($classe);
        }
        foreach ($filiers as $filier) {
            $user = Filier::create($filier);
        }
        foreach ($users as $user_data) {
            $user = User::create($user_data);
        }




        foreach ($roles as $role) {
            $user = Role::create($role);
        }
        foreach ($modules as $module) {
            $user = Module::create($module);
        }
        foreach ($module_filiers as $module_filier) {
            $user = Module_filier::create($module_filier);
        }
        foreach ($module_profs as $module_prof) {
            $user = Module_prof::create($module_prof);
        }

        Schema::enableForeignKeyConstraints();
    }
}
