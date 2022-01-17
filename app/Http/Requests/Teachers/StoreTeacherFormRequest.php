<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'number' => 'nullable|max:255',
            'role' => 'required|in:teacher,student|max:255',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['role'] = 'teacher';
        return $data;
    }
}
