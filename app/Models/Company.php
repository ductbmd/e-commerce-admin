<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table='company';
	public $timestamps = false;
    protected $fillable = [
       'name','description','file_id','country'
    ];
    public function file()
    {
    	return $this->hasOne(\Laraspace\Models\File::class,'id','file_id');
    }
}
