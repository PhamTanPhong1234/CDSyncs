<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_products')->insert([
            ['name' => 'Rock Album 1', 'description' => 'First Rock album', 'price' => 19.99, 'stock' => 100, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pop Album 1', 'description' => 'First Pop album', 'price' => 17.99, 'stock' => 150, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
