<div id="Social_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">Change Social status</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Marital Status</label>
            <select wire:model.defer="state.marital_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($maritalStatuses as $maritalStatus)
                    <option value="{{ $maritalStatus->id }}">{{ $maritalStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="" class="col-12">Determine the reason for the divorce, if any</label>
            <textarea wire:model.defer="state.divorced_reason"
                class="form-control @error('divorced_reason') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="Determine the reason for the divorce, if any" maxlength="200"></textarea>
            @error('divorced_reason')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Do you have children?</label>
            <select wire:model.defer="state.children_status_id" required="required"
                class="form-control form-control-lg ">
                @foreach ($childrenStatuses as $childStatus)
                    <option value="{{ $childStatus->id }}">{{ $childStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3">
            <label for="" class="col-12">number of children</label>
            <input wire:model.defer="state.children_count" placeholder="number of children" min="0" max="9" type="number"
                class="form-control @error('children_count') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('children_count')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="" class="col-12">Information about children</label>
            <textarea wire:model.defer="state.children_information"
                class="form-control @error('children_information') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="Information about children" maxlength="200"></textarea>
            @error('children_information')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        @if ($state['gender'] == 'male')
            <div class="input-group input-group-lg mb-3 ">
                <label for="" class="col-12">Do you want multiplicity?</label>
                <select wire:model.defer="state.polygamy_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($polygamyStatuses as $polygamyStatus)
                        <option value="{{ $polygamyStatus->id }}">{{ $polygamyStatus->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if ($state['gender'] == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label for="" class="col-12">Do you accept polygamy?</label>
                <select wire:model.defer="state.wife_polygamy_status_id" required="required"
                    class="form-control form-control-lg ">
                    @foreach ($wifePolygamyStatuses as $wifePolygamyStatus)
                        <option value="{{ $wifePolygamyStatus->id }}">{{ $wifePolygamyStatus->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">desire to have children</label>
            <select wire:model.defer="state.children_desire_status_id" required="required"
                class="form-control form-control-lg ">
                @foreach ($childrenDesireStatuses as $childrenDesireStatus)
                    <option value="{{ $childrenDesireStatus->id }}">{{ $childrenDesireStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Current type of housing</label>
            <select wire:model.defer="state.shelter_type_id" required="required" class="form-control form-control-lg ">
                @foreach ($shelterTypes as $shelterType)
                    <option value="{{ $shelterType->id }}">{{ $shelterType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">housing form</label>
            <select wire:model.defer="state.shelter_shape_id" required="required" class="form-control form-control-lg ">
                @foreach ($shelterShapes as $shelterShape)
                    <option value="{{ $shelterShape->id }}">{{ $shelterShape->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Housing method</label>
            <select wire:model.defer="state.shelter_way_id" required="required" class="form-control form-control-lg ">
                @foreach ($shelterWays as $shelterWay)
                    <option value="{{ $shelterWay->id }}">{{ $shelterWay->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
        </div>
    </form>
</div>
