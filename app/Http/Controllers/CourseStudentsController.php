<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseStudentFormRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseStudentsController extends Controller
{
    public function store(StoreCourseStudentFormRequest $request)
    {
        CourseService::joinToCourse($request->validated());
    }
}
