@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">add user</li>
    </ol>

    @if ($currentStep == 1)
        @include('livewire.admin.users.create-user-form-step1')
    @else
        @include('livewire.admin.users.create-user-form-step2')
    @endif
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            addEventListener('select2', function() {
                initSelectDrop();
            });
            window.initSelectDrop = () => {
                $('.select2').select2({
                    placeholder: '{{ __('Select') }}',
                    allowClear: true
                }).on('change', () => {
                    @this.set('state.hobbies', $('.select2').val())
                });
            }
            initSelectDrop();
        });
    </script>
@endpush
