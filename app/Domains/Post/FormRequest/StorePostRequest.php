<?php

namespace App\Domains\Post\FormRequest;

use App\Domains\Post\DataTransferObjects\PostCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:200',
            'published_at' => 'required|date',
            'cover' => 'string|max:255|nullable',
            'tags' => 'array|nullable',
            'body' => 'string|nullable',
        ];
    }

    /**
     * @return PostCreateDto
     */
    public function getDto(): PostCreateDto
    {
        return new PostCreateDto(
            $this->get('title'),
            $this->get('published_at'),
            $this->get('cover'),
            $this->get('body'),
            $this->get('tags')
        );
    }
}
