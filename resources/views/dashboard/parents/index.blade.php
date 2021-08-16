@extends('layouts.master')
@section('css')

@section('title')
    @lang("site.sidebar.grades_list")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> @lang("site.sidebar.school_grades") </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}" class="default-color">@lang("site.sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("site.sidebar.grades_list")</li>
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

                    <a href="{{route("dashboard.parents.create")}}" class="button x-small mb-5" >
                        @lang('site.grades.add_grade')
                    </a>


                    <div class="table-responsive">
                        @if(count($parents) > 0)
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> @lang("site.parent.father_name")</th>
                                    <th> @lang("site.parent.mother_name")</th>
                                    <th> @lang("site.parent.nationality_father")</th>
                                    <th> @lang("site.parent.nationality_mother")</th>
                                    <th> @lang("site.global.action")</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($parents as $index => $parent)

                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $parent->father_name }}</td>
                                        <td>{{$parent->mother_name}} </td>
                                        <td>{{$parent->nationality_father_id }} </td>
                                        <td>{{$parent->nationality_mother_id }} </td>
                                        <td>
                                            <a href="{{route("dashboard.parents.edit", $parent->id)}}" class="btn btn-info btn-sm" title="@lang('site.global.edit')"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $parent->id }}"
                                                    title="@lang('site.global.delete')"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


                                    <!-- delete_modal_grade -->
                                    <div class="modal fade" id="delete{{ $parent->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="{{route("dashboard.parents.destroy",$parent->id)}}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        @lang("site.global.warning_delete")

                                                        <div class="col mb-2">
                                                            <label for="Name" class="mr-sm-2 mt-5">@lang('site.parent.'.LaravelLocalization::getCurrentLocale() .'.father_name') :</label>
                                                            <input id="Name" type="text" name="" class="form-control" value="{{$parent->getTranslation('father_name',LaravelLocalization::getCurrentLocale())}}" disabled>
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

    </div>


        <!-- row closed -->
@endsection
@section('js')

@endsection
