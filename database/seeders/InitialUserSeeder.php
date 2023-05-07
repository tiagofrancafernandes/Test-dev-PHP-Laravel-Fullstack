<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => 'power@123',
            ],
        ];

        foreach ($users as $user) {
            \dump("User e-mail: {$user['email']}");
            \dump("User password: {$user['password']}");
            $user['password'] = \Hash::make($user['password']);

            \App\Models\User::updateOrCreate([
                'email' => $user['email'],
            ], $user);
        }
    }
}
