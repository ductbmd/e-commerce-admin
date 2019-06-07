<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable = [
       'message','product_id','parent_id','created_by','updated_by','email','rating','type'
    ];
}
