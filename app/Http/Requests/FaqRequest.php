<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question'         => ['required', 'string', 'max:255'],
            'answer'           => ['required', 'string'],
            'category'         => ['nullable', 'string', 'max:100'],
            'subcategory'      => ['nullable', 'string', 'max:100'],
            'sort_order'       => ['nullable', 'integer', 'min:0'],
            'is_published'     => ['boolean'],
            'is_featured'      => ['boolean'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => $this->boolean('is_published'),
            'is_featured'  => $this->boolean('is_featured'),
            'sort_order'   => $this->input('sort_order', 0),
        ]);
    }
}