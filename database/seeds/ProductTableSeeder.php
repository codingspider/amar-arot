<?php

use App\Model\Products;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "name" => "Onion (Local)",
                "price" => "64",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Red Tomato",
                "price" => "30",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587382305orange.jpg",
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Potato",
                "price" => "25",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Ginger Indian",
                "price" => "100",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Long Lemon",
                "price" => "12",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "2",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Green Papaya",
                "price" => "50",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Green Banana",
                "price" => "8",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "2",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Snake Gourd",
                "price" => "25",
                "stock_qty" => "100",
                "catagory_id" => "5",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Round Brinjals Black",
                "price" => "50",
                "stock_qty" => "100",
                "catagory_id" => "2",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Green Capsicum",
                "price" => "45",
                "stock_qty" => "100",
                "catagory_id" => "2",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Cabbage",
                "price" => "30",
                "stock_qty" => "100",
                "catagory_id" => "4",
                "measurment_unit_id" => "2",
                "seller_id" => "2",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Cucumber",
                "price" => "22",
                "stock_qty" => "100",
                "catagory_id" => "1",
                "measurment_unit_id" => "1",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
            [
                "name" => "Gourd",
                "price" => "22",
                "stock_qty" => "100",
                "catagory_id" => "3",
                "measurment_unit_id" => "2",
                "seller_id" => "1",
                "image" => "1587381956mango.jpg",

                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00'
            ],
        ];

        foreach($products as $product){
            Products::create($product);
        }
    }
}
