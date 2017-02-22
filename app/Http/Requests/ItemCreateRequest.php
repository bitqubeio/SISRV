<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
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
            'category_id' => 'required',
            'brand_id' => 'required',
            'item_barcode' => 'required|unique:items|min:6|max:15',
            'item_code' => 'min:6|max:15',
            'item_alternative_code' => 'min:6|max:15',
            'item_description' => 'required|min:10|max:200',
            'item_description_measure' => 'min:3|max:25',
            'measure_id' => 'required',
            'item_min_stock' => 'required|integer|min:0',
            'item_image' => 'mimes:jpeg,jpg,bmp,png',
            'item_observations' => 'min:3|max:200',
        ];
    }
}
