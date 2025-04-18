<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_name',
        'user_address',
        'user_city',
        'user_state',
        'user_country',
        'user_postcode',
        'user_phone',
        'ship_name',
        'ship_address',
        'ship_city',
        'ship_state',
        'ship_country',
        'ship_postcode',
        'ship_phone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'user_id', 'id');
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }

}
