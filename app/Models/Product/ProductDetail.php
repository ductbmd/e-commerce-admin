<?php

namespace Laraspace\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
	public $timestamps = false;
	protected $table='product_detail';
    protected $fillable = [
       'product_id','color','price','configuration'
    ];
    public function product()
    {
    	return $this->hasOne(\Laraspace\Models\Product\Product::class,'id','product_id');
    }
}
