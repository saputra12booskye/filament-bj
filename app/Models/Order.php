<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id_customer',
        'order_code',
        'total_price',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
    public function OrderItems()
    {
        return $this->hasMany(OrderItems::class, 'id_order');
    }
}
