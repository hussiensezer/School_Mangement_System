@extends('layouts.master')
@section('css')

@section('title')
    @lang("site.sidebar.classrooms_list")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> @lang("site.sidebar.classroom") </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}" class="default-color">@lang("site.sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("site.sidebar.classrooms_list")</li>
                </ol>
            </div>
        </div>
    </div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


    @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small mb-5" data-toggle="modal" data-target="#exampleModal" style="text-transform:none;">
                        @lang('site.classroom.add_classroom')
                    </button>


                    <div class="table-responsive">
                        @if(count($classrooms) > 0)
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> @lang("site.classroom.classroom_name")</th>
                                <th> @lang("site.grades.grate_name")</th>
                                <th> @lang("site.global.action")</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($classrooms as $index => $classroom)

                                <tr>
                                    
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td> {{$classroom->grade->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $classroom->id }}"
                                                title="@lang('site.global.edit')"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $classroom->id }}"
                                                title="@lang('site.global.delete')"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_classroom -->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width:135%">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    @lang("site.classrooms.edit_classroom")
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route("dashboard.classrooms.update",$classroom->id)}}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $locale)
                                                            <div class="col">
                                                                <label for="Name" class="mr-sm-2">@lang('site.classroom.'.$locale .'.classroom_name') :</label>
                                                                <input id="Name" type="text" name="name[{{$locale}}]" class="form-control" value="{{$classroom->getTranslation('name',$locale)}}">
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1"> @lang("site.classroom.grate_notes")
                                                            :</label>
                                                        <textarea class="ckeditor hello" name="notes"
                                                                  id="exampleFormControlTextarea1"
                                                                  >{{ $classroom->notes }}</textarea>
                                                    </div>
                                                    <br><br>
                                                    <input type="hidden" name="id" value="{{$classroom->id}}">
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
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{route("dashboard.classrooms.destroy",$classroom->id)}}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    @lang("site.global.warning_delete")

                                                        <div class="col mb-2">
                                                            <label for="Name" class="mr-sm-2 mt-5">@lang('site.classroom.'.LaravelLocalization::getCurrentLocale() .'.classroom_name') :</label>
                                                            <input id="Name" type="text" name="" class="form-control" value="{{$classroom->getTranslation('name',LaravelLocalization::getCurrentLocale())}}" disabled>
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
                        </table>
                       @else
                            <h2 class="alert text-warning text-center mb-5">@lang("site.global.no_data_to_show")</h2>
                      @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:135%">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            @lang('site.classroom.add_classroom')
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route("dashboard.classrooms.store")}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col">
                                    <label for="Name" class="mr-sm-2">@lang('site.classroom.ar.classroom_name') :</label>
                                    <input id="Name" type="text" name="name[ar]" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">@lang('site.classroom.en.classroom_name') :</label>
                                    <input type="text" class="form-control" name="name[en]">
                                </div>
                            </div>
                            <div class="col mt-5">
                                <label for="Name" class="mr-sm-2">@lang('site.sidebar.school_grades') :</label>
                                <select name="grade_id" id="" class="form-control p-2">
                                    <option value="" selected disabled></option>
                                   @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlTextarea1">@lang('site.classroom.classroom_notes') :</label>--}}
{{--                                <textarea class="form-control ckeditor" name="notes" id="exampleFormControlTextarea1"--}}
{{--                                          rows="3"></textarea>--}}
{{--                            </div>--}}
                            <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">@lang('site.global.close')</button>
                        <button type="submit" class="btn btn-success">@lang('site.global.add')</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection
