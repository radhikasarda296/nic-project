<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'upload excel']);
        Permission::create(['name' => 'view excel']);
        Permission::create(['name' => 'edit excel']);
        Permission::create(['name' => 'delete excel']);
    }
}
