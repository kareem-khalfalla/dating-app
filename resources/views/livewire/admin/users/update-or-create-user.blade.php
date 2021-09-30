<div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard.Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('dashboard.add user') }}</li>
    </ol>

    <h2 class="mb-4">
        @if ($currentStep == 1 && is_null($user))
            {{ __('dashboard.Add New User') }}
            @else
            {{ __('dashboard.Update User Profile') }}
        @endif
    </h2>

    @if ($currentStep == 1)
        @include('livewire.admin.users.create-user-form-step1')
    @else
        @include('livewire.admin.users.create-user-form-step2')
    @endif

</div>

</div>
