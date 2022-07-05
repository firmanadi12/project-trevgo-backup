<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Admin Trevgo',
            'email' => 'admin@trevgo.com',
            'password' => Hash::make('admin123'),
            'roles' => 'ADMIN',
            'username' => 'admin',
            'email_verified_at' => now()

        ]);
    }
}
