<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsOrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_order_items')->insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 19.99, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
