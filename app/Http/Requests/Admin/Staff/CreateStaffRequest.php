<?php

namespace App\Http\Requests\Admin\Staff;

use App\Rules\Password;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'min:6', 'max:255'],
            'phone_number' => ['required', 'string', 'unique:staff,phone_number', new PhoneNumber()],
            'email' => ['required', 'email:rfc,dns', 'string', 'max:255', 'unique:users,email'],
            'gender' => ['required', 'in:0,1,2'],
            'password' => ['nullable', 'string', 'min:8']
        ];
    }
}
