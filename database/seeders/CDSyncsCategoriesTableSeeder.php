<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_categories')->insert([
            ['name' => 'Rock', 'description' => 'Rock music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pop', 'description' => 'Pop music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jazz', 'description' => 'Jazz music', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

