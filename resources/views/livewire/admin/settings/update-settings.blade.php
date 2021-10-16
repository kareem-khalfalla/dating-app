<div class="container-fluid">
    <h1 class="mt-4">Settings</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-10 align-self-center">
                <label>Create fake user every:</label>
                <x-selectbox wire:model="createFakeUserTime">
                    <x-selectboxes.schedule_task_time />
                </x-selectbox>
            </div>

            <div class="col col-10 align-self-center">
                <label>Delete fake users every:</label>
                <x-selectbox wire:model="deleteFakeUserTime">
                    <x-selectboxes.schedule_task_time />
                </x-selectbox>
            </div>
        </div>
    </div>
</div>
