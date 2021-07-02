<?php

namespace Domain\Attachment\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentResource extends JsonResource {
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => Storage::url('images/originals/' . $this->name)
        ];
    }
}
