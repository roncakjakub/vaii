<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    /**
     * @param Course $course
     * @param array $data
     */
    public static function create(array $data)
    {
        Course::create($data);
    }

    /**
     * @param Course $course
     * @param array $data
     */
    public static function update(Course $course, array $data)
    {
        $course->update($data);
    }

    /**
     * @param Course $course
     * @param array $data
     */
    public static function delete(Course $course)
    {
        $course->delete();
    }
}
