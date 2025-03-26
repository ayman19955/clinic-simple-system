<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'practitioner_id' => 'required|exists:practitioners,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'treatment_type' => 'required|string',
            'status' => 'required|in:scheduled,completed,canceled',
            'notes' => 'nullable|string',
        ];
    }
}
