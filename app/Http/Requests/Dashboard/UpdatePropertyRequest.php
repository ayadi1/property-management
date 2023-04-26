<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:4', 'max:255', 'string'],
            'description' => ['sometimes', 'max:5000'],
            'surface' => ['required', 'integer'],
            'rooms' => ['required', 'integer'],
            'bedrooms' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'sold'=>['required','boolean'],
            'options'=>['array','exists:options,id']
            ];
    }
}
