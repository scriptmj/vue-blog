<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TagResource;
use App\Models\Tag;

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
        return $this->belongsToMany('App\Models\Tag', 'tags_posts');
    }

    public function getTags(){
        $tags = DB::table('tags_posts')->where('post_id', $this->id)->get();
        foreach($tags as $tag){
            $tag->name = Tag::find($tag->tag_id)->name;
        }
        return TagResource::collection($tags);
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
