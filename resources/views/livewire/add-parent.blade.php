<div class="parent">
<div>
<div>
@if (isset($catchError))
        <div class="alert alert-danger" id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
@endif
@if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
@endif


        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <button type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}" disabled="{{ $currentStep == 1 ? 'disabled' : '' }} ">1</button>
                    <p>@lang("site.parent.step1")</p>
                </div>
                <div class="stepwizard-step">
                    <button type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}" disabled="{{ $currentStep == 2  ? 'disabled' : '' }}">2</button>
                    <p>@lang("site.parent.step2")</p>
                </div>
                <div class="stepwizard-step">
                    <button type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="{{ $currentStep == 3 ? 'disabled' : '' }}"
                       disabled="disabled">3</button>
                    <p>@lang("site.parent.step3")</p>
                </div>
            </div>


        </div>


        @include("livewire.father_form")
        @include("livewire.mother_form")





        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
                @endif
                <div class="col-md-12 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                         <lable class="mb-3" style="font-family: 'Cairo', sans-serif; color:red;">@lang("site.parent.parent_attachments")</lable><br>
                            <input type="file" wire:model="photos" accept="image/*" multiple>
                        </div>
                        <button class="btn btn-danger btn-sm nextBtn btn-lg  mx-2" type="button"
                                wire:click="steps(2)">@lang("site.parent.previous_step")</button>
                        @if($updateMode == false)
                            <button class="btn btn-success btn-sm btn-lg  mx-2" wire:click="submitForm"
                                type="button">@lang("site.parent.saved")</button>
                        @else
                            <button class="btn btn-primary btn-sm btn-lg  mx-2" wire:click="updateForm"
                                    type="button">@lang("site.parent.update")</button>
                        @endif
                    </div>
                </div>
            </div>

    </div>








</div>

</div>

</div>
</div>
