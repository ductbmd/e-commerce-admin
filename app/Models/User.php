<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    	
    protected $table='users';
    protected $fillable = [
        'name','email','password','created_at','updated_at'
    ];
    public function Info()
    {
    	return $this->hasOne(\Laraspace\Models\UserInfo::class,'user_id','id');
    }
    // public function company()
    // {
    // 	return $this->hasOne(\Laraspace\Models\Company::class,'id','company_id');
    // }
    // public function details()
    // {
    // 	return $this->hasMany(\Laraspace\Models\Product\ProductDetail::class,'product_id','id');
    // }
    // public function category()
    // {
    //     return $this->hasMany(\Laraspace\Models\Product\ProductCategory::class,'product_id','id');
    // }
    // public function discount()
    // {
    //     return $this->hasMany(\Laraspace\Models\Product\ProductDiscount::class,'product_id','id');
    // }
}
