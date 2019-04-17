@extends('_layout')
@section("css")

@endsection


@section("content")

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card-box col-md-9">
                    {{--required--}}

                    <h4 class="header-title m-t-0 m-b-30">تسجيل الدورات التدريبة</h4>
                    <form action="{{asset('/courses/'.$items->id)}}" method="post" data-parsley-validate novalidate>
                        {{csrf_field()}}
                        @method("put")
                        <div class="form-group col-md-9">
                            <label for="userName"> اسم الدورة التدريبة :</label>
                            <input type="text" value="{{$items->name}}" name="name" parsley-trigger="change"
                                   placeholder="ادخل اسم الدورة التدريبة" class="form-control" id="userName">
                        </div>

                        <div class="form-group col-md-9">
                            <label for="passWord2">تفاصيل الدورة :</label>
                            <textarea placeholder="ادخل تفاصيل الدورة التدريبة " data-parsley-equalto="#pass1" name="details" class="form-control" id="passWord2">{{$items->details}}}</textarea>
                        </div>

                        <div class="form-group col-md-9">
                            <label for="passWord2">اسم المدرب :</label>
                            <select data-parsley-equalto="#pass1" name="coach_id" class="form-control" id="passWord2">
                                <option value=""> حدد مدرب الدورة : </option>
                                @foreach($coaches as $coach)
                                    <option {{ $items->coach_id == $coach->id?"selected":"" }} value="{{ $coach->id }}">{{ $coach->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-9">
                            <label for="pass1"> تاريخ بداية الدورة :</label>
                            <input id="pass1" value="{{ $items->start_course}}" name="start_course" type="text" placeholder="ادخل تاريخ بداية الدورة"
                                   class="form-control">
                        </div>

                        <div class="form-group col-md-9">
                            <label for="passWord2">تاريخ نهاية الدورة :</label>
                            <input name="end_course"  value="{{$items->end_course}}"  placeholder="ادخل تاريخ نهاية الدورة" data-parsley-equalto="#pass1" type="text"
                                   class="form-control" id="passWord2">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="passWord2">مكان اقامة الدورة :</label>
                            <textarea placeholder="ادخل العنوان " data-parsley-equalto="#pass1" name="address" class="form-control" id="passWord2">{{ $items->address }}</textarea>
                        </div>

                        <div class="form-group col-md-9">
                            <label for="pass1"> عدد الساعات الدورة :</label>
                            <input id="pass1" value="{{$items->hours_count}}" name="hours_count" type="number" placeholder="ادخل عدد الساعات الدورة"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="pass1"> عدد ايام الدورة :</label>
                            <input id="pass1" value="{{$items->days_count}}" name="days_count" type="number" placeholder="ادخل عدد ايام الدورة"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="pass1"> الساعة / الوقت :</label>
                            <input id="pass1" value="{{$items->time}}" name="time" type="number" placeholder="ادخل عدد ايام الدورة"
                                   class="form-control">
                        </div>

                        {{--<div class="form-group col-md-9">--}}
                        {{--<div class="checkbox">--}}
                        {{--<input id="remember-1" name="active" type="checkbox">--}}
                        {{--<label for="remember-1"> فعال </label>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group text-right m-b-0 col-md-9">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>
                            <a type="cancel" href="{{route('courses.index')}}" class="btn btn-default waves-effect waves-light m-l-5">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->
@endsection

@section("script")
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
@endsection
