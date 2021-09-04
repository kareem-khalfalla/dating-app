<div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert" role="alert">
            <button class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    <div class="shadow m-0 bg-white pb-4">

        <ol class="breadcrumb mb-4">
            <h1 class="pb-md-3 color_h col-md-5">settings</h1>
            <div class="col-md-7">
                <label for="choose_settings">Choose One</label>
                <select id="choose_settings" class="select_one form-control form-control-lg mt-0">
                    <option value="change_photo">change photo</option>
                    <option value="change_password">change password</option>
                    <option value="change_main_information">change main information</option>
                    <option value="Detailed_information">Detailed information</option>
                    <option value="Personal_profile">Personal profile</option>
                    <option value="Education_and_work">Education and work</option>
                    <option value="Social_status">Social status</option>
                    <option value="Religious_status">Religious status</option>
                    <option value="the_shape">the shape</option>
                    <option value="their_lifestyle">their lifestyle</option>
                </select>

            </div>

        </ol>

        <div class="setting_content p-0">

            <!--==============[ Start change photo]=========================-->
            
            @include('livewire.inc.change-photo')

            <!--==============[ Start change password]=========================-->
            
            @include('livewire.inc.change-password')

            <!--==============[ Start change main information]=========================-->
            
            @include('livewire.inc.main-info')

            <!--==============[ Start change Detailed_information]=========================-->
            
            @include('livewire.inc.details')

            <!--==============[ Start change Personal statement]=========================-->

            @include('livewire.inc.personal')

            <!--==============[ Start change Education and work]=========================-->

            @include('livewire.inc.education')

            <!--==============[ Start change Social status]=========================-->
            @include('livewire.inc.social')
            
            <!--==============[ Start change Religious_status]=========================-->
            
            @include('livewire.inc.religion')
            
                       
            <!--==============[ Start change the shape ]=========================-->
            
            @include('livewire.inc.shape')
            
            
            <!--==============[ Start change their_lifestyle ]=========================-->
            
            @include('livewire.inc.lifestyle')




        </div>
    </div>
</div>
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                timer: event.detail.timer,
                icon: event.detail.type,
            });
        })

        addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('delete', event.detail.id);
                }
            });
        })
    </script>
@endpush
