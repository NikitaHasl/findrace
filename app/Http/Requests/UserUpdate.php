<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'firstname' => ['sometimes', 'string', 'min:3', 'max:199'],
            'lastname' => ['sometimes', 'string', 'min:3', 'max:199'],
            'birthday' => ['sometimes'],
            'email' => ['sometimes'],
        ];
    }
    
}
