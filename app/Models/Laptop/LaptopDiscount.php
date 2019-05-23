<?php

namespace Laraspace\Models\Laptop;

use Illuminate\Database\Eloquent\Model;

class LaptopDiscount extends Model
{
	public $timestamps = false;
	protected $table='laptop_discount';
    protected $fillable = [
       'laptop_id','discount_id'
    ];
    public function laptop()
    {
    	return $this->hasMany(\Laraspace\Models\Laptop\Laptop::class,'id','laptop_id');
    }
    public function discount()
    {
    	return $this->hasMany(\Laraspace\Models\Discount::class,'id','discount_id');
    }
}
