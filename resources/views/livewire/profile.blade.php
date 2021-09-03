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
            <div id="the_shape" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change the shape</h3>

                <form id="captcha_form" class="row" method="post" action="#">
                    <br>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Length</label>
                        <input type="number" class="form-control form-control-lg" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Length">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">the weight</label>
                        <input type="number" class="form-control form-control-lg" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="the weight">
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">body type</label>
                        <select name="body_type" required="required" class="form-control form-control-lg ">
                            <option value="">body type</option>
                            <option value="harmonic">harmonic</option>
                            <option value="Athlete">Athlete</option>
                            <option value="prone to obesity">prone to obesity</option>
                            <option value="skinny">skinny</option>
                            <option value="a bit fat">a bit fat</option>
                            <option value="Fat">Fat</option>
                            <option value="Weak">Weak</option>
                            <option value="graceful">graceful</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1"> skin colour</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value=""> skin colour</option>
                            <option value="white">white</option>
                            <option value="very light">very light</option>
                            <option value="light">light</option>
                            <option value="italic Tan">italic Tan</option>
                            <option value="wheaten">wheaten</option>
                            <option value="dark">dark</option>
                            <option value="very dark">very dark</option>
                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair colour</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair colour</option>
                            <option value="Black">Black</option>
                            <option value="Brown">Brown</option>
                            <option value="Light Brown">Light Brown</option>
                            <option value="Blond">Blond</option>
                            <option value="Red">Red</option>
                            <option value="white">white</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair length</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair length</option>
                            <option value="tall a little bald">tall a little bald</option>
                            <option value="shaved">shaved</option>
                            <option value="short">short</option>
                            <option value="long">long</option>
                            <option value="very long">very long</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair type</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair type</option>
                            <option value="smooth">smooth</option>
                            <option value="wavy">wavy</option>
                            <option value="slightly curly">slightly curly</option>
                            <option value="curly much">curly much</option>
                            <option value="other">other</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Eye color</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Eye color</option>
                            <option value="black">black</option>
                            <option value="brown">brown</option>
                            <option value="hazel">hazel</option>
                            <option value="green">green</option>
                            <option value="blue">blue</option>
                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Wearing the eye</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Wearing the eye</option>
                            <option value="no">no</option>
                            <option value="glasses">glasses</option>
                            <option value="lenses">lenses</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">physical health</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">physical health</option>
                            <option value="good">good</option>
                            <option value="some persistent diseases">some persistent diseases</option>
                            <option value="partial disability">partial disability</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">psychological pattern</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">psychological pattern</option>
                            <option value="Normal">Normal</option>
                            <option value="Nervous">Nervous</option>
                            <option value="Romantic">Romantic</option>
                            <option value="hypersensitive">hypersensitive</option>
                            <option value="fast angry">fast angry</option>
                            <option value="irritable">irritable</option>
                            <option value="cold Nervous">cold Nervous</option>
                            <option value="suspicious">suspicious</option>
                            <option value="curious">curious</option>
                            <option value="mean">mean</option>
                            <option value="Fun">Fun</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">physical health</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">physical health</option>
                            <option value="no">no</option>
                            <option value="glasses">glasses</option>
                            <option value="lenses">lenses</option>

                        </select>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Clarification on physical health</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>



                    <div class="mt-4 col-12">
                        <input name="login" id="btn_login" type="submit" class="btn btn_form_settings btn-block p-2"
                            value="submit">
                    </div>

                </form>
            </div>


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
