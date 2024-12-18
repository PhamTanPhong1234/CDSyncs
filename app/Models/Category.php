<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'CDSyncs_categories';

    protected $fillable = [
        'name',
        'description',
    ];
    public $timestamps = true;
    public function news()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
