<?php

namespace Domain\Post\FormRequests;

use Domain\Post\DataTransferObjects\PostUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|max:200|nullable',
            'published_at' => 'date|nullable',
            'cover' => 'string|max:255|nullable',
            'tags' => 'array|nullable',
            'body' => 'string|nullable',
        ];
    }

    /**
     * @return PostCreateDto
     */
    public function getDto(): PostUpdateDto
    {
        return new PostUpdateDto(
            $this->get('title'),
            $this->get('published_at'),
            $this->get('cover'),
            $this->get('body'),
            $this->get('tags')
        );
    }
}
