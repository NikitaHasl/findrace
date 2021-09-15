<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRaceRequest extends FormRequest
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
            'title' => ['required', 'max:128'],
            'city' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'date' => 'required',
            'distance' => ['required', 'numeric'],
            'description' => ['required', 'max:1048'],
            'start' => ['required', 'max:128'],
            'finish' => ['required', 'max:128'],
        ];
    }
}
