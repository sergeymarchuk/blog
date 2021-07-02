<?php

namespace Domain\Attachment\FormRequests;

use Domain\Attachment\DataTransferObjects\CreateAttachmentDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttachmentRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'attachment' => 'required|file',
            'name' => 'required|string|max:250'
        ];
    }

    /**
     * @return CreateAttachmentDto
     */
    public function getDto(): CreateAttachmentDto {
        return new CreateAttachmentDto(
            $this->file('attachment'),
            $this->get('name')
        );
    }
}
