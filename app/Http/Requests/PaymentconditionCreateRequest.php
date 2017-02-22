<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentconditionCreateRequest extends FormRequest
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
            'paymentcondition_name' => 'required|unique:paymentconditions|min:3|max:25',
            'paymentcondition_mode' => 'required',
            'paymentcondition_payments' => 'integer|min:1',
            'paymentcondition_term' => 'integer|min:1',
            'paymentcondition_status' => 'boolean',
        ];
    }
}
