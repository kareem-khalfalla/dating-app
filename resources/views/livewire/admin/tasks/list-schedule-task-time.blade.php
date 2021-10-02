<div>
    <div class="container" style="margin-top: 10rem">
        <div class="row justify-content-center">
            <div class="col col-10 align-self-center">
                <label>Create fake user every:</label>
                <x-selectbox wire:model="schueduleTaskTime">
                    <x-selectboxes.schedule_task_time />
                </x-selectbox>
            </div>
        </div>
    </div>
</div>
