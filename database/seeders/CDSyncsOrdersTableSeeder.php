<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsOrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_orders')->insert([
            ['user_id' => 1, 'total_amount' => 39.98, 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
