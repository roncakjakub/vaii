<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'price', 'short_desc_1', 'short_desc_2', 'short_desc_3'];

    public function getRouteKeyName()
    {
        return 'code';
    }

}
