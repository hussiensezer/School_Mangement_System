@extends('layouts.master')
@section('css')

@section('title')
    @lang("site.teacher.add_teacher")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> @lang("site.teacher.add_teacher")</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}" class="default-color">@lang("site.sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active"> @lang("site.teacher.add_teacher")</li>
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route("dashboard.teachers.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title"> @lang("site.global.email")</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">@lang("site.global.password")</label>
                                        <input type="password" name="password" class="form-control" >
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">@lang("site.global.name_ar")</label>
                                        <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}">
                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">@lang("site.global.name_en")</label>
                                        <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">@lang("site.global.specialization")</label>
                                        <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                            <option selected disabled>@lang("site.global.choose")...</option>
                                            @foreach($specializations as $specialization)
                                                <option value="{{$specialization->id}}" {{ old("specialization_id")  == $specialization->id ? 'selected' : ''}}>{{$specialization->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">@lang("site.global.gender")</label>
                                        <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                            <option selected disabled>@lang("site.global.choose")...</option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}" {{ old("gender_id")  == $gender->id ? 'selected' : ''}}>{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="title">@lang("site.global.joined_date")</label>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text"  id="datepicker-action" name="joined_date" data-date-format="yyyy-mm-dd"  required>
                                        </div>
                                        @error('joined_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="title">@lang("site.global.phone")</label>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text" name="phone" value="{{old("phone")}}" required>
                                        </div>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">@lang("site.global.address")</label>
                                    <textarea class="form-control" name="address"
                                              id="exampleFormControlTextarea1" rows="4">{{old("address")}}</textarea>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">@lang("site.global.add")</button>
                            </form>
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
@endsection
