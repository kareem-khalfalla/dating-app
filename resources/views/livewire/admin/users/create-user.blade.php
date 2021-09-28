<div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">add user</li>
    </ol>

    <h2 class="mb-4">Add New User</h2>



    @if ($currentStep == 1)
        @include('livewire.admin.users.create-user-form-step1')
    @else
        @include('livewire.admin.users.create-user-form-step2')
    @endif

</div>

</div>
