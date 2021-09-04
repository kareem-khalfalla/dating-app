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
            <div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change their lifestyle</h3>

                <form id="captcha_form" class="row" method="post" action="#">
                    <br>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">smoking</label>
                        <select name="smoking" required="required" class="form-control form-control-lg ">
                            <option value="">smoking</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="No and I hate its smell">No and I hate its smell</option>
                            <option value="A little">A little</option>
                            <option value="hookah only">hookah only</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Alcohol</label>
                        <select name="Alcohol" required="required" class="form-control form-control-lg ">
                            <option value="">Alcohol</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="No And I can't eat it">No And I can't eat it</option>
                            <option value="Fry">Fry</option>

                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">halal food</label>
                        <select name="halal_food" required="required" class="form-control form-control-lg ">
                            <option value="">halal food</option>
                            <option value="Halal only">Halal only</option>
                            <option value="Halal if label">Halal if label</option>
                            <option value="It does not matter">It does not matter</option>
                            <option value="vegetarian">vegetarian</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">food style</label>
                        <select name="food_style" required="required" class="form-control form-control-lg ">
                            <option value="">food style</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Western">Western</option>
                            <option value="Asian">Asian</option>
                            <option value="Fast Food">Fast Food</option>
                            <option value="hearty meals">hearty meals</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Interests</label>
                        <select name="Interests" required="required" class="form-control form-control-lg ">
                            <option value="">Interests</option>
                            <option value="Sports">Sports</option>
                            <option value="reading">reading</option>
                            <option value="writing">writing</option>
                            <option value="travel">travel</option>
                            <option value="games computer">games computer</option>
                            <option value="talk">talk</option>
                            <option value="go to Cafeteria">go to Cafeteria</option>
                            <option value="Challenging Games">Challenging Games</option>
                            <option value="Chess">Chess</option>
                            <option value="Disco">Disco</option>
                            <option value="sitting in nature">sitting in nature</option>
                            <option value="games Movement">games Movement</option>
                            <option value="Watching movies">Watching movies</option>
                            <option value="Watching movies cartoon">Watching movies cartoon</option>
                            <option value="Going out with friends">Going out with friends</option>
                            <option value="Walking">Walking</option>

                        </select>
                    </div>


                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Favorite books</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">favorite places</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Other interests</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


                    <div class="mt-4 col-12">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>




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
