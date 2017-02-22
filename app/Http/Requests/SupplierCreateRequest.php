<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierCreateRequest extends FormRequest
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
            'supplier_ruc' => 'required|unique:suppliers|digits:11|numeric',
            'supplier_businessname' => 'required|unique:suppliers|max:150',
            'supplier_legaladdress' => 'required|unique:suppliers|max:150',
            'supplier_city' => 'string|max:25',
            'supplier_phone' => 'numeric|digits:9',
            'supplier_email' => 'email|max:32',
            'supplier_observation' => 'string|max:200',
            'supplier_status' => 'boolean',
        ];
    }
}
