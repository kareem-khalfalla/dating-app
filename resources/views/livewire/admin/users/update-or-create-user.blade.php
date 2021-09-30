<div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard.Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('dashboard.add user') }}</li>
    </ol>

    @if ($currentStep == 1)
        @include('livewire.admin.users.create-user-form-step1')
    @else
        @include('livewire.admin.users.create-user-form-step2')
    @endif
</div>
