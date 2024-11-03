<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('product');
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('products', 'name')->ignore($id)],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'image' => ['image', 'nullable'],
        ];
    }
}
