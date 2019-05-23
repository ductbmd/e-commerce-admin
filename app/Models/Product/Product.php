<?php

namespace Laraspace\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const mobile=1;
    const laptop=2;
    public static $type=[self::mobile=>'Mobile',self::laptop=>'Laptop'];	
    protected $table='product';
    protected $fillable = [
        'company_id','name','description','size','OS','camera_front','camera_back','CPU','RAM','ROM','memory_card','SIM_card','Pin','GPU','headphone_jack','type','price'
    ];
    public function files()
    {
    	return $this->hasMany(\Laraspace\Models\Product\ProductFile::class,'product_id','id');
    }
    public function company()
    {
    	return $this->hasOne(\Laraspace\Models\Company::class,'id','company_id');
    }
    public function details()
    {
    	return $this->hasMany(\Laraspace\Models\Product\ProductDetail::class,'product_id','id');
    }
    public function category()
    {
        return $this->hasMany(\Laraspace\Models\Product\ProductCategory::class,'product_id','id');
    }
    public function discount()
    {
        return $this->hasMany(\Laraspace\Models\Product\ProductDiscount::class,'product_id','id');
    }
}
