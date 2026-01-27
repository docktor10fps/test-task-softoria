<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRankRequest extends FormRequest
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
            'keyword' => ['required', 'string', 'min:1', 'max:255'],
            'target_site' => ['required', 'string', 'max:255'],
            'location_name' => ['required', 'string'],
            'language_name' => ['required', 'string'],
            'depth' => ['required', 'integer', 'min:10', 'max:100'],
        ];
    }
}
