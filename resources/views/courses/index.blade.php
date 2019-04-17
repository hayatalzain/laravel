@extends('_layout')
@section("css")

    <!-- DataTables -->
    <link href="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("content")


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30"> الدورات التدريبة</h4>
                <a href="{{route('courses.create')}}" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" type="button">
               <i class="fa fa-user-plus" style="
    margin-left: 6px;
"></i>اضافة دورة تدريبة </a>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم الدورة</th>
                        <th>التفاصيل</th>
                        <th>اسم المدرب</th>
                        <th> بداية الدروة</th>
                        <th> نهاية الدورة</th>
                        <th>مكان الدورة</th>
                        <th> عددد الساعات</th>
                        <th>عدد الايام</th>
                        {{--<th>تاريخ الانشاء</th>--}}
                        <th>الوقت </th>
                        <th>التحكم</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $item)
                    <tr id="row_courses{{$item->id}}">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->details}}</td>
                        <td>{{$item->coach_id}}</td>
                        <td>{{$item->start_course}}</td>
                        <td>{{$item->end_course}}</td>
                        <td>{{$item->adress}}</td>
                        <td>{{$item->hours_count}}</td>
                        <td>{{$item->days_count}}</td>
                        {{--<td>{{$item->created_at}}</td>--}}
                        <td>{{$item->time}}</td>

                        <td>
                            <a data-courses="{{$item->id}}" class="btn btn-xs btn-icon waves-effect waves-light btn-danger m-b-5 delete"  >
                                <i class="fa fa-remove"></i>
                            </a>
                            <a href="{{ asset('courses/'.$item->id.'/edit') }}" class="btn btn-xs btn-icon waves-effect waves-light btn-warning m-b-5 ">
                                <i class="fa fa-wrench"></i>
                            </a>

                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
@endsection

@section("script")
    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('#datatable-keytable').DataTable( { keys: true } );
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
            var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
        } );
        TableManageButtons.init();

    </script>
    <script>
        $(".delete").click(function(event){
            event.preventDefault();
            $id_courses= $(this).data("courses")
            $.get('{{route('courses.destroy.new')}}',{id:$id_courses},function(data){
                alert("Are you sure?");
                if(data.status== true){
                    $("#row_courses"+$id_courses).hide();
                }
            })
        });
    </script>
    <script src="{{asset('admin/assets/pages/datatables.init.js')}}"></script>
@endsection
