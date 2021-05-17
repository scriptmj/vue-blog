<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function getAllTags(){
        return Tag::all();
    }

    public function getTagsByPost(Post $post){
        return $post->tags;
    }
}
