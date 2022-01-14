<?php

namespace App\Services;

use App\Models\Course;
use App\Models\LicenceType;
use App\Models\User;

class CourseService
{
    /**
     * @param Course $course
     * @param array $data
     */
    public static function create(array $data)
    {
        actionWrapper(function () use ($data) {
            Course::create($data);
        });
    }

    /**
     * @param Course $course
     * @param array $data
     */
    public static function update(Course $course, array $data)
    {
        actionWrapper(function () use ($course, $data) {
            $course->update($data);
        });
    }

    /**
     * @param Course $course
     * @param array $data
     */
    public static function delete(Course $course)
    {
        actionWrapper(function () use ($course) {
            $course->delete();
        });
    }

    public static function deleteLicenceType(LicenceType $type)
    {
        actionWrapper(function () use ($type) {

//         Nech to iba soft deletne
            if ($type->courses()->exists() || $type->requestingStudents()->exists()) {
                // iba skryjem
                $type->delete();
            } else {
                $type->forceDelete();
            }
//        foreach ($type->courses as $course) {
//            $course->delete();
//        }
//        $reqStudents = $type->requestingStudents;
//        $type->requestingStudents()->delete();
//        foreach ($reqStudents as $request) {
//            $request->delete();
//        }
//
//        if ($type->courses()->exists() || $type->requestingStudents()->exists()) {
//            // iba skryjem
//
//        }
        });
    }

    /**
     * @param Course $course
     * @param array $data
     */
    public static function createLicenceType(array $data)
    {
        actionWrapper(function () use ($data) {
            LicenceType::create($data);
        });
    }


    /**
     * @param Course $course
     * @param array $data
     */
    public static function updateLicenceType(LicenceType $type, array $data)
    {
        actionWrapper(function () use ($type, $data) {
            $type->update($data);
        });
    }

    public static function joinToCourse(array $data)
    {
        $u = UserService::create($data);
        if ($u) {
            actionWrapper(function () use ($u, $data) {
                $u->courses()->attach($data['course_id']);
            });
        }
    }
}
