<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                "id" => 1,
                "name" => "Comilla",
                "name_bn" => "কুমিল্লা"
            ],
            [
                "id" => 2,
                "name" => "Feni",
                "name_bn" => "ফেনী"
            ],
            [
                "id" => 3,
                "name" => "Brahmanbaria",
                "name_bn" => "ব্রাহ্মণবাড়িয়া"
            ],
            [
                "id" => 4,
                "name" => "Rangamati",
                "name_bn" => "রাঙ্গামাটি"
            ],
            [
                "id" => 5,
                "name" => "Noakhali",
                "name_bn" => "নোয়াখালী"
            ],
            [
                "id" => 6,
                "name" => "Chandpur",
                "name_bn" => "চাঁদপুর"
            ],
            [
                "id" => 7,
                "name" => "Lakshmipur",
                "name_bn" => "লক্ষ্মীপুর"
            ],
            [
                "id" => 8,
                "name" => "Chattogram",
                "name_bn" => "চট্টগ্রাম"
            ],
            [
                "id" => 9,
                "name" => "Coxsbazar",
                "name_bn" => "কক্সবাজার"
            ],
            [
                "id" => 10,
                "name" => "Khagrachhari",
                "name_bn" => "খাগড়াছড়ি"
            ],
            [
                "id" => 11,
                "name" => "Bandarban",
                "name_bn" => "বান্দরবান"
            ],
            [
                "id" => 12,
                "name" => "Sirajganj",
                "name_bn" => "সিরাজগঞ্জ"
            ],
            [
                "id" => 13,
                "name" => "Pabna",
                "name_bn" => "পাবনা"
            ],
            [
                "id" => 14,
                "name" => "Bogura",
                "name_bn" => "বগুড়া"
            ],
            [
                "id" => 15,
                "name" => "Rajshahi",
                "name_bn" => "রাজশাহী"
            ],
            [
                "id" => 16,
                "name" => "Natore",
                "name_bn" => "নাটোর"
            ],
            [
                "id" => 17,
                "name" => "Joypurhat",
                "name_bn" => "জয়পুরহাট"
            ],
            [
                "id" => 18,
                "name" => "Chapainawabganj",
                "name_bn" => "চাঁপাইনবাবগঞ্জ"
            ],
            [
                "id" => 19,
                "name" => "Naogaon",
                "name_bn" => "নওগাঁ"
            ],
            [
                "id" => 20,
                "name" => "Jashore",
                "name_bn" => "যশোর"
            ],
            [
                "id" => 21,
                "name" => "Satkhira",
                "name_bn" => "সাতক্ষীরা"
            ],
            [
                "id" => 22,
                "name" => "Meherpur",
                "name_bn" => "মেহেরপুর"
            ],
            [
                "id" => 23,
                "name" => "Narail",
                "name_bn" => "নড়াইল"
            ],
            [
                "id" => 24,
                "name" => "Chuadanga",
                "name_bn" => "চুয়াডাঙ্গা"
            ],
            [
                "id" => 25,
                "name" => "Kushtia",
                "name_bn" => "কুষ্টিয়া"
            ],
            [
                "id" => 26,
                "name" => "Magura",
                "name_bn" => "মাগুরা"
            ],
            [
                "id" => 27,
                "name" => "Khulna",
                "name_bn" => "খুলনা"
            ],
            [
                "id" => 28,
                "name" => "Bagerhat",
                "name_bn" => "বাগেরহাট"
            ],
            [
                "id" => 29,
                "name" => "Jhenaidah",
                "name_bn" => "ঝিনাইদহ"
            ],
            [
                "id" => 30,
                "name" => "Jhalakathi",
                "name_bn" => "ঝালকাঠি"
            ],
            [
                "id" => 31,
                "name" => "Patuakhali",
                "name_bn" => "পটুয়াখালী"
            ],
            [
                "id" => 32,
                "name" => "Pirojpur",
                "name_bn" => "পিরোজপুর"
            ],
            [
                "id" => 33,
                "name" => "Barisal",
                "name_bn" => "বরিশাল"
            ],
            [
                "id" => 34,
                "name" => "Bhola",
                "name_bn" => "ভোলা"
            ],
            [
                "id" => 35,
                "name" => "Barguna",
                "name_bn" => "বরগুনা"
            ],
            [
                "id" => 36,
                "name" => "Sylhet",
                "name_bn" => "সিলেট"
            ],
            [
                "id" => 37,
                "name" => "Moulvibazar",
                "name_bn" => "মৌলভীবাজার"
            ],
            [
                "id" => 38,
                "name" => "Habiganj",
                "name_bn" => "হবিগঞ্জ"
            ],
            [
                "id" => 39,
                "name" => "Sunamganj",
                "name_bn" => "সুনামগঞ্জ"
            ],
            [
                "id" => 40,
                "name" => "Narsingdi",
                "name_bn" => "নরসিংদী"
            ],
            [
                "id" => 41,
                "name" => "Gazipur",
                "name_bn" => "গাজীপুর"
            ],
            [
                "id" => 42,
                "name" => "Shariatpur",
                "name_bn" => "শরীয়তপুর"
            ],
            [
                "id" => 43,
                "name" => "Narayanganj",
                "name_bn" => "নারায়ণগঞ্জ"
            ],
            [
                "id" => 44,
                "name" => "Tangail",
                "name_bn" => "টাঙ্গাইল"
            ],
            [
                "id" => 45,
                "name" => "Kishoreganj",
                "name_bn" => "কিশোরগঞ্জ"
            ],
            [
                "id" => 46,
                "name" => "Manikganj",
                "name_bn" => "মানিকগঞ্জ"
            ],
            [
                "id" => 47,
                "name" => "Dhaka",
                "name_bn" => "ঢাকা"
            ],
            [
                "id" => 48,
                "name" => "Munshiganj",
                "name_bn" => "মুন্সিগঞ্জ"
            ],
            [
                "id" => 49,
                "name" => "Rajbari",
                "name_bn" => "রাজবাড়ী"
            ],
            [
                "id" => 50,
                "name" => "Madaripur",
                "name_bn" => "মাদারীপুর"
            ],
            [
                "id" => 51,
                "name" => "Gopalganj",
                "name_bn" => "গোপালগঞ্জ"
            ],
            [
                "id" => 52,
                "name" => "Faridpur",
                "name_bn" => "ফরিদপুর"
            ],
            [
                "id" => 53,
                "name" => "Panchagarh",
                "name_bn" => "পঞ্চগড়"
            ],
            [
                "id" => 54,
                "name" => "Dinajpur",
                "name_bn" => "দিনাজপুর"
            ],
            [
                "id" => 55,
                "name" => "Lalmonirhat",
                "name_bn" => "লালমনিরহাট"
            ],
            [
                "id" => 56,
                "name" => "Nilphamari",
                "name_bn" => "নীলফামারী"
            ],
            [
                "id" => 57,
                "name" => "Gaibandha",
                "name_bn" => "গাইবান্ধা"
            ],
            [
                "id" => 58,
                "name" => "Thakurgaon",
                "name_bn" => "ঠাকুরগাঁও"
            ],
            [
                "id" => 59,
                "name" => "Rangpur",
                "name_bn" => "রংপুর"
            ],
            [
                "id" => 60,
                "name" => "Kurigram",
                "name_bn" => "কুড়িগ্রাম"
            ],
            [
                "id" => 61,
                "name" => "Sherpur",
                "name_bn" => "শেরপুর"
            ],
            [
                "id" => 62,
                "name" => "Mymensingh",
                "name_bn" => "ময়মনসিংহ"
            ],
            [
                "id" => 63,
                "name" => "Jamalpur",
                "name_bn" => "জামালপুর"
            ],
            [
                "id" => 64,
                "name" => "Netrokona",
                "name_bn" => "নেত্রকোণা"
            ]
        ];
        foreach ($districts as $district) {
            DB::table('districts')->insert($district);
        }
    }
}
