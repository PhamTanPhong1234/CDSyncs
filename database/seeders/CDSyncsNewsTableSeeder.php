<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsNewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_news')->insert([
            ['title' => 'Music News', 'content' => 'Latest news on music.', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
