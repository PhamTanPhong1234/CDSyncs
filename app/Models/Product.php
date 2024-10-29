<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'product_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }
}
