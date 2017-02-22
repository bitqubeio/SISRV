<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
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
            'supplier_ruc' => 'required|digits:11|numeric',
            'supplier_businessname' => 'required|max:150',
            'supplier_legaladdress' => 'required|max:150',
            'supplier_city' => 'string|max:25',
            'supplier_phone' => 'numeric|digits:9',
            'supplier_email' => 'email|max:32',
            'supplier_observation' => 'string|max:200',
            'supplier_status' => 'boolean',
        ];
    }
}
