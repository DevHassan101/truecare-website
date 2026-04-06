<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roles = ['admin','doctor','user'];
        foreach ($roles as $role) {
            Role::create([
                'guard_name' => "web",
                'name' => $role,
            ]);
        }
        $this->call(LocationSeeder::class);

        $users = [
            [
                'name' => "Admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make("password"),
                'role' => "admin",
            ],
            // [
            //     'name' => "Doctor",
            //     'email' => "doctor@gmail.com",
            //     'password' => Hash::make("password"),
            //     'role' => "doctor",
            // ],
            // [
            //     'name' => "User",
            //     'email' => "user@gmail.com",
            //     'password' => Hash::make("password"),
            //     'role' => "user",
            // ],
        ];


        foreach ($users as $user) {
            $newUser = User::create([
                'uid' => time(),
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}
