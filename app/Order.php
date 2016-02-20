<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'total',
        'user_id',
        'status'
    ];

    public function order_items()
    {
        return $this->hasMany('FRD\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('FRD\User');
    }
}
