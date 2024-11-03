<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Khai báo tên bảng nếu khác tên mặc định (orders)
    protected $table = 'cdsyncs_orders';

    // Các cột có thể gán giá trị
    protected $fillable = [
        'user_id',        // ID người dùng tạo đơn hàng
        'total_amount',   // Tổng giá trị đơn hàng
        'status',         // Trạng thái đơn hàng (pending, processed, shipped, delivered)
    ];

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Một đơn hàng thuộc về một người dùng
    }

    // Quan hệ với model OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id'); // Một đơn hàng có nhiều mục
    }
}
