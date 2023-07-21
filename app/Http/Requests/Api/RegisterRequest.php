<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'mobile_number' => ['required', 'string', 'max:255', Rule::unique('users', 'mobile_number')],
            'shirt_size' => ['required', 'string', Rule::in('S', 'M', 'L', 'XL', '2XL')],
            'image_path' => ['image', 'mimes:jgp,jpeg,png', 'mimeTypes:image/jpeg,image/png', 'max:2048'],
            'company_name' => ['required', 'string', 'max:255'],
            'arrival_date' => ['required', 'date:Y-m-d'],
            'departure_date' => ['required', 'date:Y-m-d', 'max:255'],
            'bed_preference' => ['required', 'numeric', 'max:255', Rule::in([0, 1])],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }
}