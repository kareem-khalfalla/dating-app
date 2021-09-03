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
            <div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change Social status</h3>

                <form id="captcha_form" method="post" action="#">
                    <br>

                    <!-- => [ Start select Religious ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Religious</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Religious</option>
                            <option value="born Muslim">born Muslim</option>
                            <option value="converted to Islam">converted to Islam</option>
                            <option value="I intend to convert to Islam">I intend to convert to Islam</option>
                            <option value="Druze">Druze</option>
                            <option value="Alawi">Alawi</option>
                            <option value="Yazidi">Yazidi</option>
                            <option value="Qadiani">Qadiani</option>
                            <option value="atheist">atheist</option>
                            <option value="Christian">Christian</option>
                            <option value="Jew">Jew</option>
                            <option value="other">other</option>
                        </select>
                    </div>
                    <!-- => [ End select Religious ] !-->

                    <!-- => [ Start select Method ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="Method" class="col-12">Method</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Method</option>
                            <option value="salafi">salafi</option>
                            <option value="ashari">ashari</option>
                            <option value="Sunnah denied">Sunnah denied</option>
                            <option value="sofi">sofi</option>
                            <option value="zydi">zydi</option>
                            <option value="gafari">gafari</option>
                            <option value="matridi">matridi</option>
                            <option value="abadi">abadi</option>
                            <option value="mdkhali">mdkhali</option>
                            <option value="ekhwani">ekhwani</option>
                            <option value="habashi">habashi</option>
                            <option value="protestant">protestant</option>
                            <option value="katholiki">katholiki</option>
                            <option value="arthodox">arthodox</option>
                            <option value="I do not know">I do not know</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- => [ End select Method ] !-->

                    <!-- => [ Start select Commitment ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Commitment</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Commitment</option>
                            <option value="committed">committed</option>
                            <option value="Uncommitted">Uncommitted</option>
                            <option value="Committed sometimes">Committed sometimes</option>
                            <option value="Not interested">Not interested</option>
                        </select>
                    </div>
                    <!-- => [ End select Commitment ] !-->

                    <!-- => [ Start select Prayer ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Prayer</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Prayer</option>
                            <option value="Committed">Committed</option>
                            <option value="I do not pray">I do not pray</option>
                            <option value="I pray sometimes">I pray sometimes</option>
                            <option value="Friday prayer only">Friday prayer only</option>
                            <option value="I often pray">I often pray</option>
                        </select>
                    </div>
                    <!-- => [ End select Prayer ] !-->

                    <!-- => [ Start select Al-fajr prayer ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Al-fajr prayer</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Al-fajr prayer</option>
                            <option value="Committed">Committed</option>
                            <option value="sometimes">sometimes</option>
                            <option value="Not interested">Not interested</option>
                        </select>
                    </div>
                    <!-- => [ End select Al-fajr prayer ] !-->

                    <!-- => [ Start select fasting ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">fasting</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">fasting</option>
                            <option value="ramadan">ramadan</option>
                            <option value="Ramadan and more">Ramadan and more</option>
                            <option value="Sunnah denied">Sunnah denied</option>
                            <option value="Not every Ramadan">Not every Ramadan</option>
                            <option value="I fast some days of Ramadan">I fast some days of Ramadan</option>
                            <option value="I do not fast">I do not fast</option>
                        </select>
                    </div>
                    <!-- => [ End select fasting ] !-->

                    <!-- => [ Start select Reading the Qoran ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Reading the Qoran</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Reading the Qoran</option>
                            <option value="Read daily">Read daily</option>
                            <option value="Read a lot">Read a lot</option>
                            <option value="Read a little">Read a little</option>
                            <option value="Scarcely">Scarcely</option>
                            <option value="Do not read">Do not read</option>
                        </select>
                    </div>
                    <!-- => [ End select Reading the Qoran ] !-->

                    <!-- => [ Start select Headdress ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Headdress</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Headdress</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                            <option value="Showing a tuft of hair">Showing a tuft of hair</option>
                        </select>
                    </div>
                    <!-- => [ End select Headdress ] !-->

                    <!-- => [ Start select Jilbab ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Jilbab</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Jilbab</option>
                            <option value="Full robes">Full robes</option>
                            <option value="Jilbab covering the knees">Jilbab covering the knees</option>
                            <option value="Jilbab covering the middle">Jilbab covering the middle</option>
                            <option value="No jilbab">No jilbab</option>
                            <option value="No but I don't want to wear it">No but I don't want to wear it</option>
                        </select>
                    </div>
                    <!-- => [ End select Jilbab ] !-->

                    <!-- => [ Start select Niqab ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Niqab</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Niqab</option>
                            <option value="No and I would like to wear it">No and I would like to wear it</option>
                            <option value="No, but if my husband wants that, I will wear it">No, but if my husband
                                wants that, I will wear it</option>
                            <option value="Finery">Finery</option>
                            <option value="sometimes">sometimes</option>

                        </select>
                    </div>
                    <!-- => [ End select Niqab ] !-->

                    <!-- => [ Start select Beard ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Beard</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Beard</option>
                            <option value="Light">Light</option>
                            <option value="heavy">heavy</option>
                            <option value="long">long</option>
                        </select>
                    </div>
                    <!-- => [ End select Beard ] !-->

                    <!-- => [ Start select Tafaqah in religion ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Tafaqah in religion</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Tafaqah in religion</option>
                            <option value="Know the basics">Know the basics</option>
                            <option value="Read or attend lessons sometimes">Read or attend lessons sometimes
                            </option>
                            <option value="Interested in education and try it">Interested in education and try it
                            </option>
                            <option value="Seek knowledge">Seek knowledge</option>
                        </select>
                    </div>
                    <!-- => [ End select JiTafaqah in religionlbab ] !-->

                    <!-- => start input If you listen to the lessons, who will you listen to?  !-->
                    <div class="form-group">
                        <label for="" class="col-12">If you listen to the lessons, who will you listen
                            to?</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="If you listen to the lessons, who will you listen to?"
                            maxlength="200"></textarea>
                    </div>
                    <!-- => End input If you listen to the lessons, who will you listen to? !-->

                    <!-- => [ Start select Listening to music] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Listening to music</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Listening to music</option>
                            <option value="Listen">Listen</option>
                            <option value="Listen a little">Listen a little</option>
                            <option value="I hear, but I want to leave it">I hear, but I want to leave it</option>
                            <option value="I don't hear songs">I don't hear songs</option>
                            <option value="I do not hear and I do not want her at home">I do not hear and I do not
                                want her at home</option>
                        </select>
                    </div>
                    <!-- => [ End select Listening to music ] !-->


                    <!-- => [ Start select Movies and series ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Movies and series</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Movies and series</option>
                            <option value="Watch it">Watch it</option>
                            <option value="A little">A little</option>
                            <option value="rarely ">rarely </option>
                            <option value="No">No</option>
                            <option value="No, and I don't want her at home">No, and I don't want her at home
                            </option>
                        </select>
                    </div>
                    <!-- => [ End select Movies and series ] !-->

                    <!-- => [ Start select Friends of the opposite sex ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Friends of the opposite sex</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Friends of the opposite sex</option>
                            <option value="I have no problem with that">I have no problem with that</option>
                            <option value="I have my own controls but">I have my own controls but</option>
                            <option value="I do not have it and I refuse to do so">I do not have it and I refuse to
                                do so</option>
                            <option value="Connect with colleagues outside of work">Connect with colleagues outside
                                of work</option>
                        </select>
                    </div>
                    <!-- => [ End select Friends of the opposite sex ] !-->

                    <div class="mt-4">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>



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
