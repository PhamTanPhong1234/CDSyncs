<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsProductReviewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_product_reviews')->insert([
            ['user_id' => 1, 'product_id' => 1, 'rating' => 5, 'comment' => 'Amazing album!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 2, 'rating' => 4, 'comment' => 'Really good!', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
