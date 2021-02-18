<?php

namespace Domain\Tag\FormRequest;

use Domain\Tag\DataTransferObjects\TagUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest {
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
            'name' => 'unique:tags|max:250',
        ];
    }

    /**
     * @return TagUpdateDto
     */
    public function getDto(): TagUpdateDto {
        return new TagUpdateDto(
            $this->get('name'),
        );
    }
}
