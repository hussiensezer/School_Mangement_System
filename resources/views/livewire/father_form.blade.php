@if($currentStep != 1)
    <div style="display:none" class="row step-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="title">@lang("site.parent.email")</label>
                        <input type="email"  class="form-control" wire:model="email" value="">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">@lang("site.parent.password")</label>
                        <input type="password"  class="form-control" wire:model="password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col">
                        <label for="title">@lang("site.parent.ar.father_name")</label>
                        <input type="text" class="form-control"  wire:model="father_name_ar">
                        @error('father_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">@lang("site.parent.en.father_name")</label>
                        <input type="text"  class="form-control" wire:model="father_name_en">
                        @error('father_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-3">
                        <label for="title">@lang("site.parent.ar.father_job")</label>
                        <input type="text" class="form-control" wire:model="father_job_ar">
                        @error('father_job_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">@lang("site.parent.en.father_job")</label>
                        <input type="text"  class="form-control" wire:model="father_job_en">
                        @error('father_job_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">@lang("site.parent.national_id_father")</label>
                        <input type="text" class="form-control" wire:model="national_id_father">
                        @error('national_id_father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">@lang("site.parent.passport_id_father")</label>
                        <input type="text"  class="form-control" wire:model="passport_id_father">
                        @error('passport_id_father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">@lang("site.parent.phone_father")</label>
                        <input type="text"  class="form-control" wire:model="father_phone">
                        @error('father_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="inputCity">@lang("site.parent.nationality_father")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_father_id" >
                            <option selected >@lang("site.global.choose")...</option>
                            @foreach($nationalities as $national)
                                <option value="{{$national->id}}">{{$national->name}}</option>
                            @endforeach
                        </select>
                        @error('nationality_father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">@lang("site.parent.bloodType_father")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="bloodType_father">
                            <option selected>@lang("site.global.choose")...</option>
                            @foreach($bloodTypes as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error('bloodType_father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">@lang("site.parent.religion_father")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_father_id">
                            <option selected>@lang("site.global.choose")...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('religion_father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">@lang("site.parent.address_father")</label>
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="4" wire:model="address_father"></textarea>
                    @error('address_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mx-2"
                            type="button"  wire:click="steps(2)" >
                        @lang("site.parent.next_step")
                    </button>

{{--                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mx-2"--}}
{{--                            type="button">@lang("site.parent.previous_step")--}}
{{--                    </button>--}}

            </div>
        </div>
    </div>
    </div>
