<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin role
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        
        // Create Admin role
        $adminRole = Role::create(['name' => 'Admin']);
        
        // Create Manager role
        $managerRole = Role::create(['name' => 'Manager']);
        
        // Create Customer role
        $customerRole = Role::create(['name' => 'Customer']);
        
        // Assign all permissions to Super Admin
        $allPermissions = Permission::all();
        $superAdminRole->syncPermissions($allPermissions);
        
        // Assign specific permissions to Admin
        $adminPermissions = Permission::whereIn('group', ['users', 'products', 'orders', 'categories'])->get();
        $adminRole->syncPermissions($adminPermissions);
        
        // Assign specific permissions to Manager
        $managerPermissions = Permission::whereIn('group', ['products', 'orders', 'categories'])
            ->whereNotIn('name', ['delete-products', 'delete-categories'])
            ->get();
        $managerRole->syncPermissions($managerPermissions);
    }
}