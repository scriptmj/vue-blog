<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getAllPosts(){
        return PostResource::collection(Post::orderBy('created_at', 'DESC')->paginate(10));
    }

    public function getPost($id){
        return new PostResource(Post::find($id));
    }

    public function getPostsByUser($id){
        return PostResource::collection(Post::where('user_id', $id)->get());
    }

    public function getPostsByTag(Tag $tag){
        return $tag->posts;
    }

    public function store(StorePostRequest $request){
        $validatedPost = new Post($request->validated());
        $validatedPost->user_id = Auth::user()->id;
        $validatedPost->save();
        $validatedPost->tags()->attach($request->tags);
    }

}
