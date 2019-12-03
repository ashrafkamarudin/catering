<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'name' => ['required', 'min:5', 'max:255'],
            'eventDate' => ['required'],
            'phoneNo' => ['required', 'numeric', 'between:0100000000,999999999999'],
            'address' => ['required', 'min:20', 'max:255'], 
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
            'phoneNo.between' => 'Phone Number must be valid without +60',
        ];
    }
}
