<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
         'filename'
];

    protected $casts =  [
        'id'=>'integer', 
        'filename'=>'string'
];
    protected $hidden =  [
        'created_at'=>'datetime', 
        'updated_at'=>'datetime',
        'deleted_at'=>'datetime'
];
}
