<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class CreatePackageRequest extends FormRequest
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
            //
            'name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:20', 'max:255'],
            'content' => ['required', 'min:20', 'max:255'],
            'price' => ['required', 'numeric', 'between:5,9999'],
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
            'price.between' => 'Minimum Package Price must be at least RM 5',
        ];
    }
}
