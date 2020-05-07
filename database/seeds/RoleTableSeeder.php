<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '2',
                'name' => 'Subscriber',
                'guard_name' => 'web',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ]
        ];
        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }

        $permissions = DB::table('permissions')->get();
        $role = DB::table('roles')->where('name', 'Admin')->select('id')->first();
        foreach ($permissions as $permission) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $role->id,
            ]);
        }
        $subscribers = DB::table('permissions')->where('id','<','9')->get();
        $role = DB::table('roles')->where('name', 'Subscriber')->select('id')->first();

        foreach($subscribers as $subscriber){
            DB::table('role_has_permissions')->insert([
                'permission_id' => $subscriber->id,
                'role_id' => $role->id,
            ]);
        }
    }
}
