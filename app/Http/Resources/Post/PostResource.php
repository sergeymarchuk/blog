<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class PostResource extends JsonResource {
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'published_at' => $this->published_at,
            'content' => $this->content,
            'cover' => $this->cover,
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
