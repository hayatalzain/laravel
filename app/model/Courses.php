<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
   protected $table='courses';
    protected $fillable = [

        "name",
        "details",
        "coach_id",
        "start_course",
        "end_course",
        "address",
        "hours_count",
        "days_count",
        "time"
    ];
}
