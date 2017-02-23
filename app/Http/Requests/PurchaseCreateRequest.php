<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseCreateRequest extends FormRequest
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
            /*
            'purchase_type_currency' => 'required',
            'paymentcondition_id' => 'required',
            'supplier_id' => 'required',
            'purchase_document' => 'required',
            'purchase_document_number_series' => 'required',
            'purchase_document_number' => 'required',
            'purchase_igv' => 'required',
            'purchase_guide_number_series' => 'required',
            'purchase_guide_number' => 'required',
            'purchase_emission_date' => 'required',
            'purchase_description' => '',
            'purchase_notes' => '',*/
        ];
    }
}
