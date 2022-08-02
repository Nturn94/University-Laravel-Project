<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', "manufacturer_id", "manufacturer", "description", "url", "image" ];

    function manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer');
    }

    function review(){
        return $this->hasMany('App\Models\Review');
    }
}
