<div id="Education_and_work" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change EducationStatus and work') }}</h3>
    <form wire:submit.prevent="updateEducation" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.EducationStatus') }}</label>
            <x-selectbox wire:model.defer="state.education_status">
                <option value="">---</option>
                <x-selectboxes.education_and_work_statuses />
            </x-selectbox>
        </div>
        <div class="form-group">
            <label class="col-12">{{ __('settings.competence') }}</label>
            <textarea wire:model.defer="state.competence" class="form-control @error('competence') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('settings.competence') }}"
                maxlength="200"></textarea>
            @error('competence')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.the work') }}</label>
            <x-selectbox wire:model.defer="state.work_status">
                <option value="">---</option>
                <x-selectboxes.work_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3">
            <label class="col-12">{{ __('settings.Monthly income') }}</label>
            <input wire:model.defer="state.income" placeholder="Monthly income" type="number"
                class="form-control @error('income') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('income')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        @if ($state['gender'] == 'male')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Do you accept the wife\'s work?') }}</label>
                <x-selectbox wire:model.defer="state.accept_wife_work_status">
                    <option value="">---</option>
                    <x-selectboxes.male.accept_wife_work_statuses />
                </x-selectbox>
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label
                    class="col-12">{{ __('settings.Do you accept studying the wife after marriageStatus?') }}</label>
                <x-selectbox wire:model.defer="state.accept_wife_study_status">
                    <option value="">---</option>
                    <x-selectboxes.male.accept_wife_study_statuses />
                </x-selectbox>
            </div>
        @else
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.You want the work?') }}</label>
                <x-selectbox wire:model.defer="state.wife_work_status">
                    <option value="">---</option>
                    <x-selectboxes.female.can_work_statuses />
                </x-selectbox>
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Do you want to study after marriageStatus?') }}</label>
                <x-selectbox wire:model.defer="state.wife_study_status">
                    <option value="">---</option>
                    <x-selectboxes.female.can_study_statuses />
                </x-selectbox>
            </div>
        @endif
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>
