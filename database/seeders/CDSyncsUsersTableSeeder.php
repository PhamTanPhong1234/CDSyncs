<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CDSyncsUsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạm thời vô hiệu hóa ràng buộc khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xóa dữ liệu từ các bảng con (bảng có ràng buộc khóa ngoại)
        DB::table('CDSyncs_orders')->delete();
        DB::table('CDSyncs_cart_items')->delete();
        DB::table('CDSyncs_product_reviews')->delete();
        DB::table('CDSyncs_news_comments')->delete();
        DB::table('CDSyncs_shipping_info')->delete();
        // Xóa dữ liệu từ bảng CDSyncs_users
        DB::table('CDSyncs_users')->delete();
        // Thêm dữ liệu vào bảng CDSyncs_users
        DB::table('CDSyncs_users')->insert([
            [
                'username' => 'user1',
                'password' => bcrypt('password1'),
                'email' => 'user1@example.com',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('adminpassword'),
                'email' => 'admin@example.com',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Bật lại ràng buộc khóa ngoại sau khi thao tác xong
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

