<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
   protected $table='degree';
    protected $fillable = [
        "name",

    ];
    function coachRelation(){
        //Table           Foreign Key   Primary Key
        return $this->belongsTo(Coach::class, "degree_id", "id");
    }

}
