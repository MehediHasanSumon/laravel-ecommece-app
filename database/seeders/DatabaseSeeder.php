<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed permissions first
        $this->call(PermissionSeeder::class);
        
        // Seed roles and assign permissions
        $this->call(RoleSeeder::class);
        
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        
        // Assign Super Admin role to admin user
        $admin->assignRole('Super Admin');
        
        // Create test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Assign Customer role to test user
        $user->assignRole('Customer');
        
        // Seed newsletter subscribers
        $this->call(NewsletterSeeder::class);
        
        // Seed products and categories
        $this->call(ProductSeeder::class);
    }
}
