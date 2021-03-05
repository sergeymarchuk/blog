<?php

namespace Domain\Post\Resources;

use Domain\Tag\Resources\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class PostResource extends JsonResource {
    /**
     * @param Request $request
     *
     * @return array`
     */
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'published_at' => date('Y-m-d', strtotime($this->published_at)),
            'body' => $this->body,
            'cover' => 1,
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
