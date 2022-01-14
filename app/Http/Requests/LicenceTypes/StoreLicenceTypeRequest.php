<?php

namespace App\Http\Requests\LicenceTypes;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicenceTypeRequest extends FormRequest
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
            'code' => 'required|string|max:20|unique:course_types,code',
            'price' => 'required|numeric',
            'short_desc_1' => 'required|string',
            'short_desc_2' => 'required|string',
            'short_desc_3' => 'required|string',
        ];
    }
}
