@extends('layouts.master')
@section('css')

@section('title')

@stop


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}" class="default-color">@lang("site.sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("site.parent.add_parent")</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

<form action="{{route("dashboard.parents.store")}}" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field("post")}}

    {{--    Father Informations--}}
        <div class="accordion gray plus-icon round mb-2" style="background:#dee2e6" >

            <div class="acd-group acd-active" >
                <a href="#" class="acd-heading">@lang("site.parent.step1") </a>
                <div class="acd-des" style="display:none">

                    <div class="row">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="d-block d-md-flex justify-content-between">
                                        <div class="d-block">
                                        </div>
                                    </div>

                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <label for="title">@lang("site.parent.email")</label>
                                                <input value="{{old("email")}}" type="email"  class="form-control" name="email">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="title">@lang("site.parent.password")</label>
                                                <input value="{{old("password")}}" type="password"  class="form-control" name="password">
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <label for="title">@lang("site.parent.ar.father_name")</label>
                                                <input value="{{old("father_name_ar")}}" type="text" class="form-control"  name="father_name_ar">
                                                @error('father_name_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="title">@lang("site.parent.en.father_name")</label>
                                                <input value="{{old("father_name_en")}}" type="text"  class="form-control" name="father_name_en">
                                                @error('father_name_en')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row mb-3">
                                            <div class="col-md-3">
                                                <label for="title">@lang("site.parent.ar.father_job")</label>
                                                <input value="{{old("father_job_ar")}}" type="text" class="form-control" name="father_job_ar">
                                                @error('father_job_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">@lang("site.parent.en.father_job")</label>
                                                <input value="{{old("father_job_en")}}" type="text"  class="form-control" name="father_job_en">
                                                @error('father_job_en')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <label for="title">@lang("site.parent.national_id_father")</label>
                                                <input value="{{old("national_id_father")}}" type="text" class="form-control" name="national_id_father">
                                                @error('national_id_father')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="title">@lang("site.parent.passport_id_father")</label>
                                                <input value="{{old("passport_id_father")}}" type="text"  class="form-control" name="passport_id_father">
                                                @error('passport_id_father')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <label for="title">@lang("site.parent.phone_father")</label>
                                                <input value="{{old("father_phone")}}" type="text"  class="form-control" name="father_phone">
                                                @error('father_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label for="input value={{old("nationality_father_id")}}City">@lang("site.parent.nationality_father")</label>
                                                <select class="custom-select my-1 mr-sm-2" name="nationality_father_id" >
                                                    <option selected >@lang("site.global.choose")...</option>
                                                    @foreach($nationalities as $national)
                                                        <option value="{{$national->id}}" {{old("nationality_father_id") == $national->id ? 'selected' : '' }}>{{$national->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('nationality_father_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label for="input value={{old("")}}State">@lang("site.parent.bloodType_father")</label>
                                                <select class="custom-select my-1 mr-sm-2" name="bloodType_father">
                                                    <option selected>@lang("site.global.choose")...</option>
                                                    @foreach($bloodTypes as $type)
                                                        <option value="{{$type->id}}" {{old("bloodType_father") == $type->id ? 'selected' : '' }}>{{$type->type}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bloodType_father')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label for="input"  >@lang("site.parent.religion_father")</label>
                                                <select class="custom-select my-1 mr-sm-2" name="religion_father_id">
                                                    <option selected>@lang("site.global.choose")...</option>
                                                    @foreach($religions as $religion)
                                                        <option value="{{$religion->id}}" {{old("religion_father_id") == $religion->id ? 'selected' : '' }}>{{$religion->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('religion_father_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site.parent.address_father")</label>
                                            <textarea class="form-control"  id="exampleFormControlTextarea1" rows="4" name="address_father">{{old("address_father")}}</textarea>
                                            @error('address_father')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    {{--    Mother Informations--}}
    <div class="accordion gray plus-icon round mb-2" style="background:#dee2e6">

        <div class="acd-group">
            <a href="#" class="acd-heading"> @lang("site.parent.step2")</a>
            <div class="acd-des" >

                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col">
                                        <label for="title">@lang("site.parent.ar.mother_name")</label>
                                        <input value="{{old("mother_name_ar")}}" type="text" class="form-control"  name="mother_name_ar">
                                        @error('mother_name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">@lang("site.parent.en.mother_name")</label>
                                        <input value="{{old("mother_name_en")}}" type="text"  class="form-control" name="mother_name_en">
                                        @error('mother_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mb-3">
                                    <div class="col-md-3">
                                        <label for="title">@lang("site.parent.ar.mother_job")</label>
                                        <input value="{{old("mother_job_ar")}}" type="text" class="form-control" name="mother_job_ar">
                                        @error('mother_job_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="title">@lang("site.parent.en.mother_job")</label>
                                        <input value="{{old("mother_job_en")}}" type="text"  class="form-control" name="mother_job_en">
                                        @error('mother_job_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">@lang("site.parent.national_id_mother")</label>
                                        <input value="{{old("national_id_mother")}}" type="text" class="form-control" name="national_id_mother">
                                        @error('national_id_mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">@lang("site.parent.passport_id_mother")</label>
                                        <input value="{{old("passport_id_mother")}}" type="text"  class="form-control" name="passport_id_mother">
                                        @error('passport_id_mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">@lang("site.parent.phone_mother")</label>
                                        <input value="{{old("mother_phone")}}" type="text"  class="form-control" name="mother_phone">
                                        @error('mother_phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="input value={{old("")}}City">@lang("site.parent.nationality_mother")</label>
                                        <select class="custom-select my-1 mr-sm-2" name="nationality_mother_id" >
                                            <option selected >@lang("site.global.choose")...</option>
                                            @foreach($nationalities as $national)
                                                <option value="{{$national->id}}" {{old("nationality_mother_id") == $national->id ? 'selected' : '' }}>{{$national->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('nationality_mother_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="input value={{old("")}}State">@lang("site.parent.bloodType_mother")</label>
                                        <select class="custom-select my-1 mr-sm-2" name="bloodType_mother">
                                            <option selected>@lang("site.global.choose")...</option>
                                            @foreach($bloodTypes as $type)
                                                <option value="{{$type->id}}" {{old("bloodType_mother") == $type->id ? 'selected' : '' }}>{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                        @error('bloodType_mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="input">@lang("site.parent.religion_mother")</label>
                                        <select class="custom-select my-1 mr-sm-2" name="religion_mother_id">
                                            <option selected>@lang("site.global.choose")...</option>
                                            @foreach($religions as $religion)
                                                <option value="{{$religion->id}}" {{old("religion_mother_id") == $religion->id ? 'selected' : '' }}>{{$religion->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('religion_mother_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">@lang("site.parent.address_mother")</label>
                                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="4" name="address_mother">{{old("address_mother")}}</textarea>
                                    @error('address_mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--    Attach Files--}}
    <div class="accordion gray plus-icon round mb-2" style="background:#dee2e6">

        <div class="acd-group">
            <a href="#" class="acd-heading">  @lang("site.parent.step3")</a>
            <div class="acd-des" >

                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">

                                </div>
                                </div>
                                <div class="form-group mb-5">
                                    <lable class="mb-3" style="font-family: 'Cairo', sans-serif; color:red;">@lang("site.parent.parent_attachments")</lable><br>
                                    <input value="{{old("")}}" type="file"  name="photos" accept="image/*" multiple>
                                </div>


                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-sm btn-lg  mx-2"
                                            type="button">@lang("site.parent.saved")</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection
@section('js')
<script src="{{asset("assets/js/jquery.steps.js")}}"></script>
<script src="{{asset("assets/js/jquery-ui.min.js")}}"></script>
<script src="{{asset("assets/js/wizardbs.js")}}"></script>


@endsection
