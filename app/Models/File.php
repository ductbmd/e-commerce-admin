<?php

namespace Laraspace\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
     protected $table = 'file';
     const IMAGE=1;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'description', 'file_name', 'type', 'created_by', 'updated_by'
    ];

}
