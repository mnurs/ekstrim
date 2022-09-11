<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'image' => '1627887212author-image.png',
            'gender' => 'male',
            'fname' => 'Super',
            'lname' => 'Admin',
            'role' => 'admin',
            'dob' => '1987-10-13',
            'age' => '33',
            'address' => 'Hill street',
            'city' => 'USA',
            'code' => '1300',
        ]);
    }
}
