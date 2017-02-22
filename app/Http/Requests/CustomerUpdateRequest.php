<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'customer_ruc_dni' => 'required|digits_between:8,11|numeric',
            'customer_businessname' => 'required|max:150',
            'customer_phone' => 'numeric|digits:9',
            'customer_email' => 'email|max:32',
            'customer_address' => 'string|max:150',
            'customer_city' => 'string|max:25',
            'customer_observation' => 'string|min:3|max:200',
            'customer_status' => 'boolean',
        ];
    }
}
