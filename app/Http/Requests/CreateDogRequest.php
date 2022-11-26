<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDogRequest extends FormRequest
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
            'name' => 'required',
            'hair_color' => 'required',
            'size' => 'required|in:small,medium,large',
            'breed_id' => 'required|exists:breeds,id'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'hair_color.required'  => 'The hair color is required',
            'size.required'  => 'The size is required',
            'breed_id.required'  => 'The breed id is required',
            'size.in'  => 'The size must be Small, Medium or Large',
            'breed_id.exists'  => 'The breed must exist in the database'
        ];
    }
}
