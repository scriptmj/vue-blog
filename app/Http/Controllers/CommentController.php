<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function getAllComments(){
        return Comment::all();
    }

    public function getCommentByPost(Post $post){
        return Comment::where('post_id', $post->id)->get();
    }

    public function storeComment(StoreCommentRequest $request){
        $validatedComment = new Comment($request->validated());
        $validatedComment->save();
    }
}
