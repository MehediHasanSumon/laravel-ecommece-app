<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if super admin already exists
        $existingAdmin = User::where('email', 'admin@example.com')->first();
        
        if ($existingAdmin) {
            // Update existing admin
            $existingAdmin->update([
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'), // Update password
            ]);
            
            // Make sure the user has the Super Admin role
            if (!$existingAdmin->hasRole('Super Admin')) {
                $existingAdmin->assignRole('Super Admin');
            }
            
            $superAdmin = $existingAdmin;
            $this->command->info('Super Admin user updated successfully!');
        } else {
            // Create super admin user with explicit password
            $superAdmin = User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // Set explicit password for super admin
            ]);
            
            // Assign Super Admin role to the user
            $superAdmin->assignRole('Super Admin');
            
            $this->command->info('Super Admin user created successfully!');
        }
        
        // Output the login credentials
        $this->command->info('Super Admin Login Details:');
        $this->command->info('Email: admin@example.com');
        $this->command->info('Password: admin123');
    }
}