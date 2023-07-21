<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:users,mobile_number'],
            'shirt_size' => ['required', 'string', Rule::in('S', 'M', 'L', 'XL', '2XL')],
            'image_path' => ['nullable', 'image', 'mimes:jgp,jpeg,png', 'mimeTypes:image/jpeg,image/png', 'max:2096'],
            'company_name' => ['required', 'string', 'max:255'],
            'arrival_date' => ['required', 'date:Y-m-d'],
            'departure_date' => ['required', 'date:Y-m-d', 'max:255'],
            'bed_preference' => ['required', 'numeric', 'max:255', Rule::in([0, 1])],
            'is_active' => ['required', 'boolean'],
            'team_id' => ['required', Rule::exists('teams', 'id')],
            'password' => 'required|confirmed|min:6',
        ];
    }
}
