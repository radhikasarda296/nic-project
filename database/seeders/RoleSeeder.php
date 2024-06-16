<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $deleterRole = Role::create(['name' => 'deleter']);
        $uploaderRole = Role::create(['name' => 'uploader']);
        $viewerRole = Role::create(['name' => 'viewer']);
        $editorRole = Role::create(['name' => 'editor']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['upload excel', 'view excel', 'edit excel', 'delete excel']);
        $uploaderRole->givePermissionTo(['upload excel']);
        $viewerRole->givePermissionTo(['view excel']);
        $editorRole->givePermissionTo(['edit excel']);
        $deleterRole->givePermissionTo(['delete excel']);
    }
}
