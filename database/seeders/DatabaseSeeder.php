<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
      
            CDSyncsCategoriesTableSeeder::class,
            CDSyncsProductsTableSeeder::class,
            CDSyncsCartItemsTableSeeder::class,
            CDSyncsOrdersTableSeeder::class,
            CDSyncsOrderItemsTableSeeder::class,
            CDSyncsProductReviewsTableSeeder::class,
            CDSyncsNewsCategoryTableSeeder::class,
            // Thêm các seeder khác nếu cần  
            CDSyncsUsersTableSeeder::class,
        ]);
    }
}