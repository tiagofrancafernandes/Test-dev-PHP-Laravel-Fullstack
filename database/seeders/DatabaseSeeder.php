<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

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
