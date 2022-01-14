<?php

namespace App\Http\Controllers;

use App\Http\Requests\courses\StoreCourseFormRequest;
use App\Http\Requests\courses\UpdateCourseFormRequest;
use App\Http\Requests\LicenceTypes\StoreLicenceTypeRequest;
use App\Http\Requests\LicenceTypes\UpdateLicenceTypeRequest;
use App\Models\Course;
use App\Models\LicenceType;
use App\Models\Vehicle;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('kurzy.index', compact('courses'));
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $type
     * @return \Illuminate\Http\Response
     */
    public function getByLicenceTypeCode(LicenceType $type)
    {
        abort_unless(\request()->expectsJson(), 406);
        return $type->availableCourses->append(['date_to_formatted', 'date_from_formatted']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licenceTypes = LicenceType::all();
        $vehicles = Vehicle::all();
        return view('kurzy.create', compact('licenceTypes', 'vehicles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseFormRequest $request)
    {
        CourseService::create($request->validated());
        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $type
     * @return \Illuminate\Http\Response
     */
    public function show(Course $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $licenceTypes = LicenceType::all();
        $vehicles = Vehicle::all();
        return view('kurzy.edit', compact('course', 'licenceTypes', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseFormRequest $request, Course $course)
    {
        CourseService::update($course, $request->validated());
        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        CourseService::delete($course);
    }
}
