<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['review', 'rating', "user_id", "product_id"];

    function UserOwnsReview(){
        return $this->belongsTo('App\Models\User');
    }

    function ProductOwnsReview (){
        return $this->belongsTo('App\Models\Product');
    }
}
