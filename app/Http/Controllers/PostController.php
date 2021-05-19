<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function getAllPosts(){
        //return Post::all();

        // $posts = Post::all();
        // foreach($posts as $post){
        //     $post->author = $post->user->name;
        // }
        // return $posts;
        return PostResource::collection(Post::all());
    }

    public function getPost($id){
        return new PostResource(Post::find($id));
    }

    public function getPostsByUser(User $user){
        return Post::where('user_id', $user->id)->get();
    }

    public function getPostsByTag(Tag $tag){
        return $tag->posts;
    }

    public function store(StorePostRequest $request){
        $validatedPost = new Post($request->validated());
        $validatedPost->save();
    }

}
