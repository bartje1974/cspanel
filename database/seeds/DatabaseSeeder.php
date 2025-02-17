<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $role = Role::create(['name' => 'User']);
    }
}
