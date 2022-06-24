<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ClientSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('clients')->insert([
            [
                'name_en'        => 'client1',
                'name_ar'        => 'اول عميل',
                'email'          => 'client1@client.com',
                'password'       => Hash::make(12345678),
                'mobile'         => '01234567891',
                'date_of_birth'  => '1990-06-09',
                'gender'         => 'male',
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'name_en'        => 'client2',
                'name_ar'        => 'ثانى عميل',
                'email'          => 'client2@client.com',
                'password'       => Hash::make(12345678),
                'mobile'         => '01234567892',
                'date_of_birth'  => '1990-05-09',
                'gender'         => 'female',
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
