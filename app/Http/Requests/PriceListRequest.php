<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceListRequest extends FormRequest
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
            'price_list_name' => 'required',
            'price_list_type' => 'required|in:0,1',
            'price_list_percentage' => 'required_if:price_list_type,1',
            'price_list_value' => 'required_if:price_list_type,1',
        ];
    }
}
