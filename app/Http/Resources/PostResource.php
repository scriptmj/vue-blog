<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\CommentCollection;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'author' => $this->user->name,
            'user_id' => $this->user->id,
            'created_at' => $this->created_at->toDayDateTimeString(),
            'comments' => CommentResource::collection($this->comments),
            'tags' => $this->tags,
        ];
    }
}
