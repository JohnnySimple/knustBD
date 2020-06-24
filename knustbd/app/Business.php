<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    protected $fillable = [
        'name',
        'email',
        'location',
        'phone',
        'user_id',
        'imageName',
        'rating',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
