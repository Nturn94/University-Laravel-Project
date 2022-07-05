<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Company',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Bigger Company',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
