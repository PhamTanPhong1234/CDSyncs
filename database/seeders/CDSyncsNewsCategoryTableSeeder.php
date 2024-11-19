<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsNewsCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_news_categories')->insert([
            ['name' => 'Technology', 'description' => 'Tin tức công nghệ mới nhất', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Entertainment', 'description' => 'Tin tức giải trí', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'description' => 'Cập nhật tin tức thể thao', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health', 'description' => 'Tin tức về sức khỏe và y tế', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
