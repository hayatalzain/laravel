<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"=>"required|max:100",
            "details"=>"required",
            "coach_id"=>"required",
            "start_course"=>"required",
            "end_course"=>"required",
            "hours_count"=>"required",
            "address"=>"required",
            "days_count"=>"required",
            "time"=>"required",

        ];
    }
}
