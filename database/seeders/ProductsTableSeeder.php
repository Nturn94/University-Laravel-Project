<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Book',
            'price' => '15',
            'manufacturer_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            'manufacturer' => "Scholastic Inc",
            'description' => "A Book for reading",
            'url' => "https://en.wikipedia.org/wiki/Harry_Potter",
        ]);
        DB::table('products')->insert([
            'name' => 'Phone',
            'price' => '506',
            'manufacturer_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            'manufacturer' => "Apple",
            'description' => "The newest Iphone to hit market. Now with three cameras!",
            'url' => "https://en.wikipedia.org/wiki/IPhone",
        ]);
    }
}
