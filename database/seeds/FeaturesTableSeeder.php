<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            ['feature_name' => 'a'],
            ['feature_name' => 'b'],
            ['feature_name' => 'c'],
            ['feature_name' => 'd'],
        ]);
    }
}
