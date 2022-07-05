<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'review' => 'This was a great read, Highly recommend',
            'rating' => '4.0',
            'user_id' => 1,
            'product_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'review' => 'Bad phone, low battery life',
            'rating' => '2.0',
            'user_id' => 2,
            'product_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

    }
}
