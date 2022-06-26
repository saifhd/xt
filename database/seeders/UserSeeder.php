<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pharmacy',
            'email' => 'pharmacy@mail.com',
            'password' => Hash::make('password'),
            'address_line_1' => 'No 10,',
            'address_line_2' => 'Peradeniya',
            'address_line_3' => 'Kandy',
            'contact_no' => '0771112223',
            'dob' => '1990-10-15',
            'user_level' => User::PHARMACY
        ]);

        User::create([
            'name' => 'User1',
            'email' => 'user1@mail.com',
            'password' => Hash::make('password'),
            'address_line_1' => 'No 20,',
            'address_line_2' => 'Katugastota',
            'address_line_3' => 'Kandy',
            'contact_no' => '0777772223',
            'dob' => '1992-01-15',
            'user_level' => User::USER
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('password'),
            'address_line_1' => 'No 15/A,',
            'address_line_2' => 'Maradana',
            'address_line_3' => 'Colombo',
            'contact_no' => '0777892223',
            'dob' => '1991-09-15',
            'user_level' => User::USER
        ]);
    }
}
