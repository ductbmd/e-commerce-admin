<?php

namespace Laraspace\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
   public $timestamps = false;
    protected $table='product_category';
    protected $fillable = [
        'product_id','category_id','description'
    ];
    public function product()
    {
    	return $this->hasOne(\Laraspace\Models\Product\Product::class,'id','product_id');
    }
    public function category()
    {
    	return $this->hasOne(\Laraspace\Models\Category::class,'id','category_id');
    }
    
}