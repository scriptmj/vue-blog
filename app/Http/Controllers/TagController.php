<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\TagResource;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    public function getAllTags(){
        return TagResource::collection(Tag::all());
    }

    public function getTagsByPost(Post $post){
        return $post->tags;
    }

    public function store(StoreTagRequest $request){
        $tag = Tag::create($request->all());
    }
}
