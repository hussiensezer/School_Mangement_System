
@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>


                <div class="form-row mb-3">
                    <div class="col">
                        <label for="title">@lang("site.parent.ar.mother_name")</label>
                        <input type="text" class="form-control"  wire:model="mother_name_ar">
                        @error('mother_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">@lang("site.parent.en.mother_name")</label>
                        <input type="text"  class="form-control" wire:model="mother_name_en">
                        @error('mother_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-3">
                        <label for="title">@lang("site.parent.ar.mother_job")</label>
                        <input type="text" class="form-control" wire:model="mother_job_ar">
                        @error('mother_job_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">@lang("site.parent.en.mother_job")</label>
                        <input type="text"  class="form-control" wire:model="mother_job_en">
                        @error('mother_job_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">@lang("site.parent.national_id_mother")</label>
                        <input type="text" class="form-control" wire:model="national_id_mother">
                        @error('national_id_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">@lang("site.parent.passport_id_mother")</label>
                        <input type="text"  class="form-control" wire:model="passport_id_mother">
                        @error('passport_id_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">@lang("site.parent.phone_mother")</label>
                        <input type="text"  class="form-control" wire:model="mother_phone">
                        @error('mother_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="inputCity">@lang("site.parent.nationality_mother")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_mother_id" >
                            <option selected >@lang("site.global.choose")...</option>
                            @foreach($nationalities as $national)
                                <option value="{{$national->id}}">{{$national->name}}</option>
                            @endforeach
                        </select>
                        @error('nationality_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">@lang("site.parent.bloodType_mother")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="bloodType_mother">
                            <option selected>@lang("site.global.choose")...</option>
                            @foreach($bloodTypes as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error('bloodType_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">@lang("site.parent.religion_mother")</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_mother_id">
                            <option selected>@lang("site.global.choose")...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('Religion_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">@lang("site.parent.address_mother")</label>
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="4" wire:model="Address_mother"></textarea>
                    @error('Address_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mx-2"
                            type="button"  wire:click="steps(3)">
                        @lang("site.parent.next_step")
                    </button>

                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right mx-2"
                            type="button"  wire:click="steps(1)">@lang("site.parent.previous_step")
                    </button>

            </div>
        </div>
    </div>
    </div>

