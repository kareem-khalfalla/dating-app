<div id="Social_status" class="col-lg-11 m-auto pb-4" wire:ignore>
    <h3 class="color_h">Change Social status</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>

        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Marital Status</label>
            <select wire:model="state.marital_status_id" required="required" class="form-control form-control-lg ">
                <option disabled value="">Marital Status</option>
                @foreach ($maritalStatuses as $maritalStatus)
                    <option value="{{ $maritalStatus->id }}">{{ $maritalStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="" class="col-12">Determine the reason for the divorce, if any</label>
            <textarea wire:model="state.divorced_reason"
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
            <select wire:model="state.children_status_id" required="required" class="form-control form-control-lg ">
                <option disabled value="">Do you have children?</option>
                @foreach ($childrenStatuses as $childStatus)
                    <option value="{{ $childStatus->id }}">{{ $childStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3">
            <label for="" class="col-12">number of children</label>
            <input wire:model="state.childrenCount" placeholder="number of children" type="number"
                class="form-control @error('childrenCount') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('childrenCount')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="" class="col-12">Marital Status</label>
            <textarea wire:model="state.childrenInformation"
                class="form-control @error('childrenInformation') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="Information about children" maxlength="200"></textarea>
            @error('childrenInformation')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        @if ($state['gender'] == 'male')
            <div class="input-group input-group-lg mb-3 ">
                <label for="" class="col-12">Do you want multiplicity?</label>
                <select wire:model="state.polygamy_status_id" required="required" class="form-control form-control-lg ">
                    <option disabled value="">Do you want multiplicity?</option>
                    @foreach ($polygamyStatuses as $polygamyStatus)
                        <option value="{{ $polygamyStatus->id }}">{{ $polygamyStatus->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if ($state['gender'] == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label for="" class="col-12">Do you accept polygamy?</label>
                <select wire:model="state.wife_polygamy_status_id" required="required"
                    class="form-control form-control-lg ">
                    <option disabled value="">Do you accept polygamy?</option>
                    @foreach ($wifePolygamyStatuses as $wifePolygamyStatus)
                        <option value="{{ $wifePolygamyStatus->id }}">{{ $wifePolygamyStatus->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif


        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">desire to have children</label>
            <select name="" required="required" class="form-control form-control-lg ">
                <option value="">desire to have children</option>
                <option value="I would like it">I would like it</option>
                <option value="I do not want it">I do not want it</option>
                <option value="Yes but not now">Yes but not now</option>
                <option value="According to the desire of the other party">According to the desire of
                    the other party</option>
            </select>
        </div>
        <!-- => [ End select desire to have children ] !-->

        <!-- => [ Start select Current type of housing ] !-->
        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Current type of housing</label>
            <select name="" required="required" class="form-control form-control-lg ">
                <option value="">Current type of housing</option>
                <option value="Owner">Owner</option>
                <option value="tenant">tenant</option>
            </select>
        </div>
        <!-- => [ End select Curren b t type of housing ] !-->

        <!-- => [ Start select housing form ] !-->
        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">housing form</label>
            <select name="" required="required" class="form-control form-control-lg ">
                <option value="">housing form</option>
                <option value="Detached house">Detached house</option>
                <option value="Apartment">Apartment</option>
                <option value="room">room</option>
                <option value="student residence">student residence</option>
                <option value="shared housing">shared housing</option>
            </select>
        </div>
        <!-- => [ End select ousing form ] !-->

        <!-- => [ Start select housing form ] !-->
        <div class="input-group input-group-lg mb-3 ">
            <label for="" class="col-12">Housing method</label>
            <select name="" required="required" class="form-control form-control-lg ">
                <option value="">Housing method</option>
                <option value="Alone">Alone</option>
                <option value="with family">with family</option>
                <option value="with friends">with friends</option>

            </select>
        </div>
        <!-- => [ End select Housing method] !-->


        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
        </div>

    </form>
</div>
