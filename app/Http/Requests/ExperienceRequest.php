<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'organization' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'start_date' => ['required'],
            'end_date' => ['nullable'],
            'milestones' => ['required','string', 'max:255'],
            'note' => ['nullable','string', 'max:255'],
            'link' => ['nullable','string', 'max:255'],
        ];
    }
}
