<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'image',
        'premium',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function tags(){
        return $this->hasMany('App\Models\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
