<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('email','admin@gmail.com')->first()->id;

        DB::table('locations')->insert([
            [
                'lat' => '30.144420',
                'lng' => '31.265712',
                'info' => 'Egypt,Cairo',
                'user_id' => $userId
            ],
            [
                'lat' => '30.244620',
                'lng' => '31.969712',
                'info' => 'Egypt,10th Ramadan City',
                'user_id' => $userId
            ]
            ]);
    }
}
