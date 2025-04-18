<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'total_amount',
        'vat',
        'payable',
        'customer_details',
        'shipping_details',
        'transaction_id',
        'validation_id',
        'delivery_status',
        'payment_status',
        'user_id',
    ];
    protected $casts = [
        'customer_details' => 'array',
        'shipping_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

}
