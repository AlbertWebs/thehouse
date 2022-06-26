<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'notes'=>'notes',
               'location'=>'location',
               'mobile'=>'mobile',
               'email'=>'admin@shaqshouse.co.ke',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'notes'=>'notes',
               'location'=>'location',
               'mobile'=>'mobile',
               'email'=>'user@shaqshouse.co.ke',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
