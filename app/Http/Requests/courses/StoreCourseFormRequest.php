<?php

namespace App\Http\Requests\courses;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseFormRequest extends FormRequest
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
            'licence_type_code' => 'required|exists:licence_types,code',
            'date_from' => 'required|date|date_format:Y-m-d',
            'date_to' => 'required|date|date_format:Y-m-d|after:date_from',
            'capacity' => 'required|numeric|integer|min:0',
            'vehicle_id' => 'nullable|exists:vehicles,id',
        ];
    }
}
