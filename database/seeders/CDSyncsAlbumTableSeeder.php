<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsAlbumTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('CDSyncs_album')->insert([
            [
                'title' => 'Greatest Hits',
                'image' => 'images/albums/greatest_hits.jpg', // Đường dẫn hình ảnh
                'artist_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Classic Collection',
                'image' => 'images/albums/classic_collection.jpg', // Đường dẫn hình ảnh
                'artist_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rock Anthems',
                'image' => 'images/albums/rock_anthems.jpg', // Đường dẫn hình ảnh
                'artist_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pop Essentials',
                'image' => 'images/albums/pop_essentials.jpg', // Đường dẫn hình ảnh
                'artist_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

