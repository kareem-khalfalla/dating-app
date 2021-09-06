<div id="Education_and_work" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">Change Education and work</h3>
    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Education</label>
            <select wire:model.defer="state.education_id" required="required" class="form-control form-control-lg ">
                <option value="">Education</option>
                @foreach ($educations as $education)
                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="col-12">competence</label>
            <textarea wire:model.defer="state.competence" class="form-control @error('competence') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" placeholder="competence" maxlength="200"></textarea>
            @error('competence')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">the work</label>
            <select wire:model.defer="state.work_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($workStatuses as $workStatus)
                    <option value="{{ $workStatus->id }}">{{ $workStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group input-group-lg mb-3">
            <label class="col-12">Monthly income</label>
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
                <label class="col-12">Do you accept the wife's work?</label>
                <select wire:model.defer="state.accept_wife_work_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($acceptWifeWorkStatuses as $acceptence)
                        <option value="{{ $acceptence->id }}">{{ $acceptence->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">Do you accept studying the wife after marriage?</label>
                <select wire:model.defer="state.accept_wife_study_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($acceptWifeStudyStatuses as $studyAcceptence)
                        <option value="{{ $studyAcceptence->id }}">{{ $studyAcceptence->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        @if ($state['gender'] == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">You want the work?</label>
                <select wire:model.defer="state.wife_work_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($wifeWorkStatuses as $wifeWorkStatus)
                        <option value="{{ $wifeWorkStatus->id }}">{{ $wifeWorkStatus->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">Do you want to study after marriage?</label>
                <select wire:model.defer="state.wife_study_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($wifeStudyStatuses as $wifeStudyStatus)
                        <option value="{{ $wifeStudyStatus->id }}">{{ $wifeStudyStatus->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
        </div>

    </form>
</div>
