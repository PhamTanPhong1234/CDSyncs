<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'CDSyncs_artists';

    // Các thuộc tính có thể được gán theo cách mass-assignable
    protected $fillable = [
        'name',
        'bio'
    ];

    // Định nghĩa mối quan hệ với bảng `CDSyncs_album`
    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_id');
    }
}

