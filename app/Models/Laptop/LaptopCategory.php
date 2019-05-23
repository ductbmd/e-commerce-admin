<?php

namespace Laraspace\Models\Laptop;

use Illuminate\Database\Eloquent\Model;

class LaptopCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
   public $timestamps=false;
    protected $table='laptop_category';
    protected $fillable = [
        'laptop_id','category_id','description'
    ];
    public function laptop()
    {
    	return $this->hasMany(\Laraspace\Models\Laptop\Laptop::class,'id','laptop_id');
    }
    public function category()
    {
    	return $this->hasOne(\Laraspace\Models\Category::class,'id','category_id');
    }
    
}