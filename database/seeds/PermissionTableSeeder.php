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
           'measurment-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
