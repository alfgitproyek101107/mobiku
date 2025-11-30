<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfile;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@mobiku.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+6281234567890',
            'address' => 'Jakarta, Indonesia',
            'status' => 'active',
        ]);

        // Create admin profile
        UserProfile::create([
            'user_id' => $admin->id,
            'bio' => 'System Administrator for Mobiku platform',
            'gender' => 'male',
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Admin login: admin@mobiku.com / password');
    }
}
