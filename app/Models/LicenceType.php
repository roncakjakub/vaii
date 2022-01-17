<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['code', 'price', 'short_desc_1', 'short_desc_2', 'short_desc_3', 'capacity'];
    protected $primaryKey = 'code';
    public $incrementing = false;


    public function getRouteKeyName()
    {
        return 'code';
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'licence_type_code', 'code');
    }

    public function getAvailableCoursesAttribute()
    {
        return $this->courses()
            ->where('date_from', '>=', now()->addWeek()->format('Y-m-d'))
            ->withCount('students')
            ->havingRaw('students_count < courses.capacity')
            ->get();
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'licence_type_id');
    }

//    public function requestingStudents()
//    {
//        // todo: do formulara na ziadost moze ist aj vyber z moznych terminov, ktore zada admin, no to mozno az v neskorsich krokoch
//        // TODO: Mozno by som vo formulari ukazal iba meno, email a cislo a az po kliknuti na odoslat sa otvori modal, kde bude vyber kurzu a terminu aj s oslovenim podla zadaneho mena :)
//        return $this->belongsToMany(Student::class, 'course_requests', 'student_id', 'course_id');
//    }
}
