<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Md Rokon',
        	'name_bn' => 'Md Rokon',
        	'email' => 'rokon@gmail.com',
        	'phone' => '01710101010',
        	'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('name')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
