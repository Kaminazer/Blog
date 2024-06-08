<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
         //   'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255', 'unique:news,title'],
            'content' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,bmp,png,jpeg,webp,svg', 'max:2048'],
            'tags' => ['nullable'],
            'tags.*' => ['nullable'],
            'status_display' => ['required']
        ];
    }
}
