<?php

use App\Model\Catagory;
use Illuminate\Database\Seeder;

class CatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => '1',
                'name' => 'Fresh Fruits',
                'name_bn' => 'তাজা ফল',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                'id' => '2',
                'name' => 'Fresh Vegetables',
                'name_bn' => 'তাজা সবজি',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ]
        ];

        foreach ($categories as $category) {
            Catagory::create($category);
        }
    }
}
