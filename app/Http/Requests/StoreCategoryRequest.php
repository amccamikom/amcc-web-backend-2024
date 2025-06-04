<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'description.required' => 'Deskripsi kategori wajib diisi.',
        ];
    }
}