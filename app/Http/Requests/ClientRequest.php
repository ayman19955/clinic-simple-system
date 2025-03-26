<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $clientId = $this->route('client'); // Get the client ID from the route

        return [
            'client_name'      => 'required|string|max:255',
            'date_of_birth'    => 'required|date',
            'gender'           => 'required|in:male,female',
            'contact_number'   => 'required|string|max:15',
            'email'            => 'nullable|email|max:255|unique:clients,email,' . $this->client,
            'address'          => 'nullable|string|max:500',
            'medical_history'  => 'nullable|string',
            'emergency_contact' => 'nullable|string|max:15',
        ];
    }

    public function messages()
    {
        return [
            'client_name.required' => trans('validation.required', ['attribute' => 'اسم العميل']),
            'date_of_birth.required' => trans('validation.required', ['attribute' => 'تاريخ الميلاد']),
            'gender.required' => trans('validation.required', ['attribute' => 'الجنس']),
            'contact_number.required' => trans('validation.required', ['attribute' => 'رقم الاتصال']),
            'email.email' => trans('validation.email'),
            'email.unique' => trans('validation.unique', ['attribute' => 'البريد الإلكتروني']),
            'address.max' => trans('validation.max.string', ['attribute' => 'العنوان', 'max' => 500]),
        ];
    }
}
