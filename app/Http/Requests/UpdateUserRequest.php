<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $this->user->id],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:users,mobile_number,' . $this->user->id],
            'shirt_size' => ['required', 'string', Rule::in('S', 'M', 'L', 'XL', '2XL')],
            'image_path' => ['nullable', 'image', 'mimes:jgp,jpeg,png', 'mimeTypes:image/jpeg,image/png', 'max:2096'],
            'company_name' => ['required', 'string', 'max:255'],
            'arrival_date' => ['required', 'date:Y-m-d'],
            'departure_date' => ['required', 'date:Y-m-d', 'max:255'],
            'bed_preference' => ['required', 'numeric', 'max:255', Rule::in([0, 1])],
            'is_active' => ['required', 'boolean'],
            'team_id' => ['required', Rule::exists('teams', 'id')],
        ];

        if(isset($this->password)) {
            return array_merge($rules, ['password' => 'required|confirmed|min:6']);
        }

        return $rules;
    }
}
