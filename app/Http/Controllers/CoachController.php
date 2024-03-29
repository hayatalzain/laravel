<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoachRequest;
use App\Http\Requests\EditCoachRequest;
use App\model\Coach;
use App\model\Degree;
use Session;

class CoachController extends Controller
{
    public function index()
    {
        $items=Coach::get();
        return view('coach.index',compact('items'));
    }

    public function create()
    {
        $degrees = Degree::get();
        return view('coach.create',compact('degrees'));
    }

    public function store(CoachRequest $request)
    {
        Coach::create($request->all());
        Session::flash("msg", "s:Country Created successfully");
        return redirect()->route('coach.create');
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
        $items=Coach::find($id);
        if (!$items) {
            Session::flash("msg", "e:Invalid Country ID, please check your URL");
            return redirect()->route("coach.index");
        }
        $degrees = Degree::get();
        return view('coach.edit', compact('items','id','degrees'));
    }


    public function update(EditCoachRequest $request, $id)
    {
        Coach::find($id)->update($request->all());
        Session::flash("msg", "i:Country updated successfully");
        return redirect()->route('coach.index');
    }


    public function destroy(Request $request)
    {
        $id_coach=$request->id;
        $items = Coach::find($id_coach);
        $items->delete( );
        return Response::json(['status' => true]);
    }
}
