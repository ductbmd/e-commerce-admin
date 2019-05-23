<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
	protected $table='discount';
    protected $fillable = [
       'time_start','time_expired','discount','created_by','created_at','updated_at','type','description'
    ];
}
