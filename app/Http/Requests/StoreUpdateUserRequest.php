<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
        $id = auth()->user()->id;
        return [
            'name'     => ['max:255'],
            'email'    => ['max:255', Rule::unique('users', 'email')->ignore($id)],
            'password' => ['min:8', 'nullable'],
        ];
    }
}
