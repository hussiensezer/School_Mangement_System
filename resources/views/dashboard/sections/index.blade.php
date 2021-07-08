@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang("site.sidebar.sections_list")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> @lang("site.sidebar.sections") </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}" class="default-color">@lang("site.sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("site.sidebar.sections")</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    @lang('site.section.add_section')
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @foreach($allGrades as $grade)
                        <div class="accordion gray plus-icon round">

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{$grade->name}}</a>
                                    <div class="acd-des" >

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>@lang("site.section.section")</th>
                                                                    <th>@lang("site.classroom.classroom")</th>
                                                                    <th>@lang("site.global.status")</th>
                                                                    <th>@lang("site.global.action")</th>
                                                                </tr>
                                                                </thead>
                                                                 <tbody>
                                                                  @foreach($grade->sections as $i => $section)
                                                                        <tr>
                                                                            <td>{{ $i+1}}</td>
                                                                            <td>{{$section->name}}</td>
                                                                            <td>{{$section->classroom->name}}</td>
                                                                            <td>
                                                                             @if($section->status == 1)
                                                                                    <a href="{{route("dashboard.sections.status", $section->id)}}" class="badge bg-success text-white btn-sm">@lang("site.global.active")</a>
                                                                             @else
                                                                                <a href="{{route("dashboard.sections.status", $section->id)}}" class="badge bg-danger text-white btn-sm">@lang("site.global.deactivate")</a>
                                                                             @endif

                                                                            </td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-info btn-sm btn-edit" data-toggle="modal"
                                                                                        data-target="#edit{{ $section->id }}"
                                                                                        title="@lang('site.global.edit')" data-value="{{ $section->grade_id }}" data-classroom = "{{$section->classroom_id}}"><i class="fa fa-edit"></i></button>
                                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                                        data-target="#delete{{ $section->id }}"
                                                                                        title="@lang('site.global.delete')"><i
                                                                                        class="fa fa-trash"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- edit_modal_classroom -->
                                                                        <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
                                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content" style="width:135%">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            @lang("site.classroom.edit_classroom")
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <!-- add_form -->
                                                                                        <form action="{{route("dashboard.sections.update",$section->id)}}" method="post">
                                                                                            {{ method_field('patch') }}
                                                                                            @csrf
                                                                                            <div class="row">
                                                                                                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $locale)
                                                                                                    <div class="col">
                                                                                                        <label for="Name" class="mr-sm-2">@lang('site.section.'.$locale .'.section_name') :</label>
                                                                                                        <input id="Name" type="text" name="name_{{$locale}}" class="form-control" value="{{$section->getTranslation('name',$locale)}}">
                                                                                                    </div>
                                                                                                @endforeach



                                                                                            </div>

                                                                                            <div class="col-md-12 mb-3">
                                                                                                <label for="inputName"
                                                                                                       class="control-label">@lang("site.grades.choose_grade")</label>
                                                                                                <select name="grade_id" class="custom-select grade_id">
                                                                                                    <!--placeholder-->
                                                                                                    <option value="" selected disabled>@lang("site.grades.grade")</option>
                                                                                                    @foreach($grades as $grade)
                                                                                                        <option value="{{$grade->id}}" {{$grade->id == $section->grade_id ? 'selected' : '' }}>{{$grade->name}}</option>

                                                                                                    @endforeach()
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col-md-12 mt-3 classRoomDiv">
                                                                                                <label for="inputName" class="control-label">@lang("site.classroom.choose_classroom")</label>

                                                                                                <select name="classroom_id"  class="classroom_id custom-select classroomEditId">
                                                                                                    <option value="" selected disabled>@lang("site.classroom.classroom")</option>

                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="col-md-12 mt-3 status">
                                                                                                <label for="inputName" class="control-label">@lang("site.global.status")</label>

                                                                                                <select name="status"  class="status custom-select">
                                                                                                    <option value="" selected disabled>@lang("site.global.choose_status")</option>
                                                                                                    <option value="1" {{$section->status == 1 ? 'selected' : ''}} >@lang("site.global.active")</option>
                                                                                                    <option value="0" {{$section->status == 0 ? 'selected' : ''}}>@lang("site.global.deactivate")</option>

                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary"
                                                                                                        data-dismiss="modal"> @lang("site.global.close")</button>
                                                                                                <button type="submit"
                                                                                                        class="btn btn-success">@lang("site.global.edit")</button>
                                                                                            </div>
                                                                                        </form>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- delete_modal_classroom -->
                                                                        <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog"
                                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content" style="width:135%;">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            @lang("site.global.delete")
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="{{route("dashboard.sections.destroy",$section->id)}}" method="post">
                                                                                            {{ method_field('Delete') }}
                                                                                            @csrf
                                                                                            @lang("site.global.warning_delete")

                                                                                            <div class="col mb-2">
                                                                                                <label for="Name" class="mr-sm-2 mt-5">@lang('site.section.'.LaravelLocalization::getCurrentLocale() .'.section_name') :</label>
                                                                                                <input id="Name" type="text" name="" class="form-control" value="{{$section->getTranslation('name',LaravelLocalization::getCurrentLocale())}}" disabled>
                                                                                            </div>


                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary"
                                                                                                        data-dismiss="modal">@lang("site.global.close")</button>
                                                                                                <button type="submit"
                                                                                                        class="btn btn-danger">@lang("site.global.delete")</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                   @endforeach
                                                                 </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        @endforeach
                    </div>

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel"> @lang("site.section.add_section")</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('dashboard.sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $locale)
                                                <div class="col-md-6 mb-3">
                                                    <label for="Name" class="mr-sm-2">@lang('site.section.'.$locale .'.section_name') :</label>
                                                    <input id="Name" type="text" name="name_{{$locale}}" class="form-control" value="">
                                                </div>
                                            @endforeach


                                        <div class="col-md-12 mb-3">
                                            <label for="inputName"
                                                   class="control-label">@lang("site.grades.choose_grade")</label>
                                            <select name="grade_id" class="custom-select grade_id">
                                                <!--placeholder-->
                                                <option value="" selected disabled>@lang("site.grades.grade")</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                @endforeach()
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-3 classRoomDiv">
                                            <label for="inputName" class="control-label">@lang("site.classroom.choose_classroom")</label>

                                            <select name="classroom_id"  class="classroom_id custom-select">
                                                <option value="" selected disabled>@lang("site.classroom.classroom")</option>

                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-3 status">
                                            <label for="inputName" class="control-label">@lang("site.global.status")</label>

                                            <select name="status"  class="status custom-select">
                                                    <option value="" selected disabled>@lang("site.global.choose_status")</option>
                                                    <option value="1">@lang("site.global.active")</option>
                                                    <option value="0">@lang("site.global.deactivate")</option>

                                            </select>
                                        </div>
                                <div class="modal-footer mt-3 border-top-0 text-center">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">@lang("site.global.close")</button>
                                    <button type="submit"
                                            class="btn btn-success">@lang("site.global.add")</button>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </div>
    </div>

        <!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function(){


        // Ajax get ClassRooms in Sections
        $(".grade_id").change(function () {

            let gradeId = $(this).val();
            if(gradeId) {
                $.ajax({
                    url:"{{URL::to("dashboard/sections/classes")}}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $(".classroom_id").empty();
                        $.each(data,function(id,name){
                            $(".classroom_id").append('<option value="'+
                                id + '">' + name + "</option>"
                            );
                        });

                    }
                });
            }
        });
        //  End Ajax get ClassRooms in Sections

        // Start Ajax get ClassRooms in Sections When Click To Edit Button
            $(".btn-edit").on("click",function(){
               let classRoom = $(this),
                   classroomId = classRoom.data("classroom");

               $.ajax({
                   url: "{{URL::to("dashboard/sections/classes")}}/" + classRoom.data("value"),
                   type: "GET",
                   dataType: "json",
                   success: function (data) {

                       $(".classroomEditId").empty();
                       $.each(data,function(id,name){
                         let  comparison = id == classroomId ? 'selected' : '';
                           $(".classroomEditId").append('<option value="'+
                               id + '"' + comparison + '>' + name + "</option>"
                           );
                       });

                   }
               });
            });
        // End Ajax get ClassRooms in Sections When Click To Edit Button
    });
</script>

@endsection
