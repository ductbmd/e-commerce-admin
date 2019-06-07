<?php

namespace Laraspace\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    protected $fillable = [
       'user_id','status','total_amount','note','payment'
    ];
    public function user()
    {
    	return $this->hasOne(\Laraspace\Models\UserInfo::class,'id','user_id');
    }
    public function detail()
    {
    	return $this->hasMany(\Laraspace\Models\Order\OrderDetail::class,'order_id','id');
    
    }
}
