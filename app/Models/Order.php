<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'subtotal',
        'discount',
        'shipping_cost',
        'tax',
        'total',
        'locality',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'type',
        'paypal_payment_id',
        'payment_method',
        'payment_status',
        'delivered_date',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}


    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
