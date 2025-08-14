<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permission groups and their permissions
        $permissionGroups = [
            'users' => [
                'view-users',
                'create-users',
                'edit-users',
                'delete-users',
            ],
            'roles' => [
                'view-roles',
                'create-roles',
                'edit-roles',
                'delete-roles',
            ],
            'permissions' => [
                'view-permissions',
                'create-permissions',
                'edit-permissions',
                'delete-permissions',
            ],
            'products' => [
                'view-products',
                'create-products',
                'edit-products',
                'delete-products',
            ],
            'categories' => [
                'view-categories',
                'create-categories',
                'edit-categories',
                'delete-categories',
            ],
            'orders' => [
                'view-orders',
                'update-order-status',
                'delete-orders',
            ],
            'customers' => [
                'view-customers',
                'edit-customers',
                'delete-customers',
            ],
            'discounts' => [
                'view-discounts',
                'create-discounts',
                'edit-discounts',
                'delete-discounts',
            ],
            'settings' => [
                'view-settings',
                'update-settings',
            ],
        ];

        // Create permissions
        foreach ($permissionGroups as $group => $permissions) {
            foreach ($permissions as $permission) {
                Permission::create([
                    'name' => $permission,
                    'group' => $group,
                ]);
            }
        }
    }
}