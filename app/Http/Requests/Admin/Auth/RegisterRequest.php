<?php

namespace App\Http\Requests\Admin\Auth;

use App\Rules\Password;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'email:rfc,dns', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', new Password() ,'confirmed'],
            'full_name' => ['required', 'string', 'min:2', 'max:255'],
            'phone_number' => ['required', 'string', new PhoneNumber()],
            'gender' => ['required', 'in:0,1,2'],
        ];
    }
}
