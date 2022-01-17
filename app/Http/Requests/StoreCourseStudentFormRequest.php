<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseStudentFormRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id'
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['role'] = 'student';
        return $data;
    }
}
