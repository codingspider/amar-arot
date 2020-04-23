<?php

use App\Model\MeasurmentUnit;
use Illuminate\Database\Seeder;

class MeasurmentUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = [
            [
                'id' => '1',
                'name' => 'KG',
                'name_bn' => 'কেজি',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                'id' => '2',
                'name' => 'Pieces',
                'name_bn' => 'টি',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ]
        ];

        foreach($measurements as $measurement){
            MeasurmentUnit::create($measurement);
        }
    }
}
