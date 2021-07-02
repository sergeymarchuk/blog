<?php

namespace Domain\Tag\FormRequests;

use Domain\Tag\DataTransferObjects\TagCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest {
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
            'name' => 'required|unique:tags|max:250',
        ];
    }

    /**
     * @return TagCreateDto
     */
    public function getDto(): TagCreateDto {
        return new TagCreateDto(
            $this->get('name'),
        );
    }
}
