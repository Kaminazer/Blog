<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts','title')->ignore($this->post)],
            'content' => ['required', 'string'],
            'preview_image' => ['required', 'mimes:jpg,bmp,png,jpeg,webp,svg', 'max:1024'],
            'main_image' => ['required', 'mimes:jpg,bmp,png,jpeg,webp,svg', 'max:1024'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags_id' => ['nullable', 'array'],
            'tags_id.*' => ['nullable', 'integer', 'exists:tags,id'],
        ];
    }
}
