<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default admin user
        User::create([
            'name' => 'Admin Tegal Maja',
            'email' => 'admin@Tegalmaja.com',
            'password' => Hash::make('Tegalmaja123'),
        ]);

        // Generate additional users
        User::factory(10)->create();
    }
}
