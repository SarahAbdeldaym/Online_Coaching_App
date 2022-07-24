<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\City;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder {

    public function run() {
        $alex_id = City::where('name_en', 'Alexandria')->first()->id;

        District::create(['city_id' => $alex_id, 'name_ar' => 'ميامي', 'name_en'     => 'Miami']);
        District::create(['city_id' => $alex_id, 'name_ar' => 'كفر عبدو', 'name_en'  => 'Kafr Abdo']);
    }
}
