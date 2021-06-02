<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getAllPosts(){
        if(Auth::user() && Auth::user()->isPremiumActive()){
            return PostResource::collection(Post::orderBy('created_at', 'DESC')->paginate(10));
        } else {
            return PostResource::collection(Post::where('premium', false)->orderBy('created_at', 'DESC')->paginate(10));
        }
    }

    public function getPost($id){
        return new PostResource(Post::find($id));
    }

    public function getPostsByUser($id){
        return PostResource::collection(Post::where('user_id', $id)->get());
    }

    public function getPostsByTag($tag_id){
        return PostResource::collection(Tag::find($tag_id)->posts()->paginate(10));
    }

    public function store(StorePostRequest $request){
        $validatedPost = new Post($request->validated());
        $validatedPost->user_id = Auth::user()->id;
        $validatedPost->image = $request->image->store('imagefiles');
        $validatedPost->save();
        $validatedPost->tags()->attach(json_decode($request->tags[0]));
    }

    public function update(UpdatePostRequest $request, $id){
        $validatedPost = $request->validated();
        $existingPost = Post::find($id);
        if($request->image !== null){
            $existingPost->image = $request->image->store('imagefiles');
        }
        $existingPost->update($validatedPost);
        $existingPost->tags()->sync(json_decode($request->tags[0]));
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->comments()->delete();
        $post->delete();
    }

}
