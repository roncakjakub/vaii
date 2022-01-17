<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenceTypes\StoreLicenceTypeRequest;
use App\Http\Requests\LicenceTypes\UpdateLicenceTypeRequest;
use App\Models\LicenceType;
use App\Services\CourseService;
use Illuminate\Http\Request;

class LicenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $licenceTypes = LicenceType::all();
        return view('licencie.index', compact('licenceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licencie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLicenceTypeRequest $request)
    {
        CourseService::createLicenceType($request->validated());
        return redirect()->route('licence_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param LicenceType $type
     * @return \Illuminate\Http\Response
     */
    public function show(LicenceType $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LicenceType $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(LicenceType $type)
    {
        return view('licencie.edit', compact('type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLicenceTypeRequest $request
     * @param LicenceType $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLicenceTypeRequest $request, LicenceType $type)
    {
        CourseService::updateLicenceType($type, $request->validated());
        return redirect()->route('licence_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LicenceType $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenceType $type)
    {
        CourseService::deleteLicenceType($type);
        return redirect()->route('licence_types.index');

    }
}
