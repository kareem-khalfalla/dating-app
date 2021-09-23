<div class="shadow m-0 bg-white pb-4">

    <ol class="breadcrumb mb-4">
        <h1 class="pb-md-3 color_h col-md-5">{{ __('settings.settings') }}</h1>
        <div class="col-md-7">
            <label for="choose_settings">{{ __('settings.Choose One') }}</label>
            <select id="choose_settings" class="select_one form-control form-control-lg mt-0">
                <option value="change_photo">{{ __('settings.change photo') }}</option>
                <option value="change_password">{{ __('settings.change password') }}</option>
                <option value="change_main_information">{{ __('settings.change main information') }}</option>
                <option value="Detailed_information">{{ __('settings.Detailed information') }}</option>
                <option value="Personal_profile">{{ __('settings.Personal profile') }}</option>
                <option value="Education_and_work">{{ __('settings.EducationStatus and work') }}</option>
                <option value="Social_status">{{ __('settings.Social status') }}</option>
                <option value="Religious_status">{{ __('settings.Religious status') }}</option>
                <option value="the_shape">{{ __('settings.the shape') }}</option>
                <option value="their_lifestyle">{{ __('settings.their lifestyle') }}</option>
            </select>

        </div>

    </ol>

    <div class="setting_content p-0">
        @include('livewire.inc.change-photo')
        @include('livewire.inc.change-password')
        @include('livewire.inc.main-info')
        @include('livewire.inc.details')
        @include('livewire.inc.personal')
        @include('livewire.inc.education')
        @include('livewire.inc.social')
        @include('livewire.inc.religion')
        @include('livewire.inc.shape')
        @include('livewire.inc.lifestyle')
    </div>
</div>
