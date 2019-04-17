<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoursesRequest;
use App\Http\Requests\EditCoachRequest;
use App\model\Courses;
use App\model\Coach;
use Session;

class CoursesController extends Controller
{
    public function index()
    {
        $items=Courses::get();
        return view('courses.index',compact('items'));
    }

    public function create()
    {
        $coaches = Coach::get();
        return view('courses.create',compact('coaches'));
    }

    public function store(CoursesRequest $request)
    {
        Courses::create($request->all());
        Session::flash("msg", "s:Country Created successfully");
        return redirect()->route('courses.create');
    }

    public function show($id)
    {
//        $items=Coach::find($id);
//        if(!$items){
//            Coach::flash("msg", "e:Invalid Country ID, please check your URL");
//            return redirect()->route("coach.index");
//        }
//        return view('coach.show',compact('items'));
    }

    public function edit($id)
    {
        $items=Courses::find($id);
        if (!$items) {
            Session::flash("msg", "e:Invalid Country ID, please check your URL");
            return redirect()->route("courses.index");
        }
        $coaches = Coach::get();
        return view('courses.edit', compact('items','id','coaches'));
    }


    public function update(CoursesRequest $request, $id)
    {
        Courses::find($id)->update($request->all());
        Session::flash("msg", "i:Country updated successfully");
        return redirect()->route('courses.index');
    }


    public function destroy(Request $request)
    {
        $id_courses=$request->id;
        $items = Courses::find($id_courses);
        $items->delete( );
        return Response::json(['status' => true]);
    }
}
