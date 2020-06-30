<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create website']);
        Permission::create(['name' => 'edit website']);
        Permission::create(['name' => 'delete website']);
        Permission::create(['name' => 'suspend website']);
        Permission::create(['name' => 'create ftp']);
        Permission::create(['name' => 'edit ftp']);
        Permission::create(['name' => 'delete ftp']);
        Permission::create(['name' => 'suspend ftp']);
        Permission::create(['name' => 'create databases']);
        Permission::create(['name' => 'delete databases']);
        Permission::create(['name' => 'suspend databases']);
        Permission::create(['name' => 'create email']);
        Permission::create(['name' => 'edit email']);
        Permission::create(['name' => 'delete email']);
        Permission::create(['name' => 'suspend email']);
        Permission::create(['name' => 'suspend user']);
        Permission::create(['name' => 'promote user']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);


        // create roles and assign created permissions

        // this can be done as separate statements
        //$role = Role::create(['name' => 'user']);
        //$role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role1 = Role::create(['name' => 'user'])
            ->givePermissionTo(['create website', 'edit website', 'delete website',
            					'create ftp', 'edit ftp', 'delete ftp', 'create databases',
            					'delete databases', 'create email', 'edit email', 'delete email']);

        $role2 = Role::create(['name' => 'reseller'])
            ->givePermissionTo(['create website', 'edit website', 'delete website',
            					'create ftp', 'edit ftp', 'delete ftp', 'create databases',
            					'delete databases', 'create email', 'edit email', 'delete email',
            					'suspend email', 'suspend databases', 'suspend ftp', 'suspend website',
            					'suspend user', 'promote user', 'edit user'
            				]);

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());


    }

}
