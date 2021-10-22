<section id="latest users" class="bg-white mb-4">
    <br>
    <div class="container-fluid bg-white pt-3 pb-3">
        <div class="row m-1">

            @if (isset($users) && count($users) > 1)

            <h2 class="h_2 mb-3 col-12 pb-3">{{ __('welcome.latest users') }}</h2>
                
                    @foreach ($users->take(6) as $user)

                        <div class="row col-12 col-sm-8 col-md-6 col-lg-4 mb-2 pb-3">
                            <div class="col-5 col-md-5 p-0 m-0">
                                <img class="p-0 m-0 img-fluid
                                " style="border: 1px solid #eee;"
                                    src="{{ asset('storage/' . $user->avatar) }}" width="150px" height="150px" alt="">
                            </div>
                            <div class="col-7 col-md-7">
                                <p class="row p-1 m-0"><b>{{ __('welcome.Name') }} : </b> {{ $user->username }}</p>

                                <p class="row p-1 m-0"><b>{{ __('welcome.Age') }} : </b>
                                    {{ Carbon\Carbon::parse($user->profile->dob)->age == 0 ? 'N/A' : Carbon\Carbon::parse($user->profile->dob)->age }}
                                </p>
                                <p class="row p-1 m-0"><b>{{ __('welcome.From') }} : </b>
                                    {{ $user->profile->countryOfOrigin ? $user->profile->countryOfOrigin->getCountryLocale() : 'N/A' }}
                                </p>
                                <p class="row p-1 m-0"><b>{{ __('welcome.Stay in') }} : </b>
                                    {{ $user->profile->countryOfResidence ? $user->profile->countryOfResidence->getCountryLocale() : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                

            @endif
        </div>
    </div>


    <br>
</section>
