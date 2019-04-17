<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
   protected $table='coach';
    protected $fillable = [
        "name",
        "gender",
        "email",
        "mobile",
        "id_number",
        "address",
        "degree_id",
        "note",
        "active"
    ];
}
