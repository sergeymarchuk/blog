<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class TagResource extends JsonResource {
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
