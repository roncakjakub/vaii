<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StoreStudentFormRequest;
use App\Http\Requests\Students\UpdateStudentFormRequest;
use App\Http\Requests\Teachers\StoreTeacherFormRequest;
use App\Http\Requests\Teachers\UpdateTeacherFormRequest;
use App\Models\Course;
use App\Models\LicenceType;
use App\Models\User;
use App\Services\UserService;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::teachers()->get();
        return view('ucitelia.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ucitelia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherFormRequest $request)
    {
        UserService::create($request->validated());
        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        return view('ucitelia.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherFormRequest $request, User $teacher)
    {
        UserService::update($teacher, $request->validated());
        return redirect()->route('admin.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        UserService::delete($teacher);
    }
}
