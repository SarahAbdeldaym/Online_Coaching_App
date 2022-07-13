<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CoachSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('coaches')->insert([
            [
                'name_en'        => 'coach1',
                'name_ar'        => 'اول مدرب',
                'email'          => 'coach1@coach.com',
                'password'       => Hash::make(12345678),
                'gender'         => 'male',
                'mobile'         => '01234567891',
                'date_of_birth'  => '1990-06-09',
                'session_time'   => 15,
                'address_en'     => "Iskander Ibrahim",
                'address_ar'     => "أسكندر ابراهيم",
                'fees'           => 300,
                'remember_token' => Str::random(10),
                'specialist_id'  => 1,
                'country_id'     => 5,
                'city_id'        => 2,
                'district_id'    => 1,
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'name_en'        => 'coach2',
                'name_ar'        => 'ثانى مدرب',
                'email'          => 'coach2@coach.com',
                'password'       => Hash::make(12345678),
                'gender'         => 'male',
                'mobile'         => '01234567892',
                'date_of_birth'  => '1990-05-09',
                'session_time'   => 20,
                'address_en'     => "Kafr Abdo",
                'address_ar'     => "كفر عبدو",
                'fees'           => 350,
                'remember_token' => Str::random(10),
                'specialist_id'  => 1,
                'country_id'     => 5,
                'city_id'        => 2,
                'district_id'    => 2,
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
