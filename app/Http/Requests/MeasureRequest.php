<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasureRequest extends FormRequest
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
            'measure_name' => 'required|unique:measures|min:3|max:25',
        ];
    }
}
