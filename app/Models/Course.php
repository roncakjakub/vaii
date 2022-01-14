<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['licence_type_code', 'date_from', 'date_to', 'vehicle_id','capacity'];

    public function licenceType()
    {
        return $this->belongsTo(LicenceType::class, 'licence_type_code','code');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students', 'user_id', 'course_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_teachers', 'user_id', 'course_id');
    }

//    public function vehicles()
//    {
//        return $this->belongsToMany(Vehicle::class, 'course_vehicles', 'vehicle_id', 'course_id');
//    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function getDateFromFormattedAttribute()
    {
        return (new Carbon($this->date_from))->format('d.m.Y');
    }

    public function getDateToFormattedAttribute()
    {
        return (new Carbon($this->date_to))->format('d.m.Y');
    }
}
