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
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'catagory-list',
           'catagory-create',
           'catagory-edit',
           'catagory-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'measurment-list',
           'measurment-create',
           'measurment-edit',
           'measurment-delete',
           'social-list',
           'social-create',
           'social-edit',
           'social-delete',
           'setting-list',
           'setting-create',
           'setting-edit',
           'setting-delete',
           'header-list',
           'header-create',
           'header-edit',
           'header-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
