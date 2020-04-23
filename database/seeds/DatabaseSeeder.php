<?php

use App\Model\MeasurmentUnit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CatagoryTableSeeder::class);
        $this->call(MeasurmentUnitTableSeeder::class);
    }
}
