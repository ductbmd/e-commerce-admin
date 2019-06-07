<?php

namespace Laraspace\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_detail';
	public $timestamps = false;
    protected $fillable = [
       'order_id','product_id','qty','price','type'
    ];
}
