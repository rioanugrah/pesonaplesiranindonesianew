<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $permissions = [
            'transaction-list',
            'transaction-create',
            'transaction-detail',
            'transaction-edit',
            'transaction-update',
            'transaction-delete',
            'permission-list',
            'permission-create',
            'permission-detail',
            'permission-edit',
            'permission-update',
            'permission-delete',
            'role-list',
            'role-create',
            'role-detail',
            'role-edit',
            'role-update',
            'role-delete',
            'user-list',
            'user-create',
            'user-detail',
            'user-edit',
            'user-update',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
