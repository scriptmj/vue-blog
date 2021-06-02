<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function getAllComments(){
        return Comment::all();
    }

    public function getCommentsByPost($postId){
        return CommentResource::collection(Post::findOrFail($postId)->comments->sortByDesc('created_at'));
    }

    public function storeComment(StoreCommentRequest $request){
        $validatedComment = new Comment($request->validated());
        $validatedComment->user_id = Auth::user()->id;
        $validatedComment->save();
    }
    
}
