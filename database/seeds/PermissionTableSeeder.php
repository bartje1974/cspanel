<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'website-index',
            'website-create',
            'website-edit',
            'website-delete',
            'website-suspended',
            'database-index',
            'database-create',
            'database-edit',
            'database-delete',
            'database-suspended',
            'email-index',
            'email-create',
            'email-edit',
            'email-delete',
            'email-suspended',
            'ftp-index',
            'ftp-create',
            'ftp-edit',
            'ftp-delete',
            'ftp-suspended',
            'domain-index',
            'domain-create',
            'domain-edit',
            'domain-delete',
            'domain-suspended',

         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
