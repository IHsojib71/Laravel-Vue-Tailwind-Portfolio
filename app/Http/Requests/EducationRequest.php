<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'course_name' => ['required', 'string', 'max:255'],
            'course_duration' => ['required', 'string', 'max:255'],
            'passing_year' => ['required', 'string', 'max:255'],
            'institute' => ['required', 'string', 'max:255'],
            'result' => ['required', 'string', 'max:255'],
            'course_works' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
        ];
    }
}
