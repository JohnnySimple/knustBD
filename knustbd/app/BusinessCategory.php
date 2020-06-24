<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    //
    protected $table = 'business_category';
    protected $fillable = [
        'business_id',
        'category_id',
    ];
}
