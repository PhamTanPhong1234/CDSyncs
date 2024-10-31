<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='cdsyncs_users';
    protected $fillable = [
        'username',
        'password',
        'email',
        'social_id',
        'role',
    ];
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    

    public function shippingInfos()
    {
        return $this->hasMany(ShippingInfo::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'user_id', 'id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'user_id', 'id');
    }

    public function newsComments()
    {
        return $this->hasMany(NewsComment::class, 'user_id', 'id');
    }

    public function socialLogins()
    {
        return $this->hasMany(SocialLogin::class, 'user_id', 'id');
    }

    public function adminLogs()
    {
        return $this->hasMany(AdminLog::class, 'admin_id', 'id');
    }
}


