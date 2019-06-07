<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
	protected $table='user_info';
	
    protected $fillable = [
       'user_id','sex','birth','address','avatar','name','city','country','zip_code','phone'
    ];
     public function userlogin()
    {
    	return $this->hasOne(\Laraspace\Models\User::class,'id','user_id');
    }
}
