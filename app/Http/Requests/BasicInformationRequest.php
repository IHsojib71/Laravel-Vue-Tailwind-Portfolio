<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicInformationRequest extends FormRequest
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
        return [
            'site_title' => ['required', 'string', 'max:255'],
            'site_sub_title' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email','string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'github' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
