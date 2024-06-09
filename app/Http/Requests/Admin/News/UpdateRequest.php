<?php

namespace App\Http\Requests\Admin\News;

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
            'title' => ['required', 'string', 'max:255', 'unique:news,title'],
            'content' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,bmp,png,jpeg,webp,svg', 'max:2048'],
            'tags' => ['nullable'],
            'status_display' => ['required']
        ];
    }
}
