<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StoreStudentFormRequest;
use App\Http\Requests\Students\UpdateStudentFormRequest;
use App\Models\User;
use App\Services\UserService;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::students()->get();
        return view('studenti.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studenti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentFormRequest $request)
    {
        UserService::create($request->validated());
        return redirect()->route('admin.students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        return view('studenti.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentFormRequest $request, User $student)
    {
        UserService::update($student, $request->validated());
        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        UserService::delete($student);
    }
}
