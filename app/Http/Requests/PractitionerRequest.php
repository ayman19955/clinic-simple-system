<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PractitionerRequest extends FormRequest
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
    public function rules() :array
    {
        return [
            'practitioner_name'  => 'required|string|max:255',
            'specialization'     => 'required|string|max:255',
            'contact_number'     => 'required|string|max:15',
            'email'              => 'required|email|max:255|unique:practitioners,email,' . $this->practitioner,
            'experience_years'   => 'required|integer|min:0|max:100',
            'availability_hours' => 'required|string|max:50',
        ];
    }
}
