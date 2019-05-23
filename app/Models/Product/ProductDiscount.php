<?php

namespace Laraspace\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
	public $timestamps = false;
	protected $table='product_discount';
    protected $fillable = [
       'product_id','discount_id'
    ];
    public function product()
    {
    	return $this->hasMany(\Laraspace\Models\Product\Product::class,'id','product_id');
    }
    public function discount()
    {
    	return $this->hasMany(\Laraspace\Models\Discount::class,'id','discount_id');
    }
}
