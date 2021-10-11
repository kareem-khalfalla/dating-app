<section id="latest users" class="bg-white mb-4">
    <br>
    <div class="container-fluid bg-white pt-3 pb-3">
        <div class="row">

            @if (isset($users) && count($users) > 1)

                <div class="col-12 col-md-5 col-lg-4 mb-4 latest_user1">
                    <h2 class="h_2 mb-3">{{ __('welcome.latest users') }}</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('welcome.Name') }}</th>
                                <th scope="col">{{ __('welcome.Age') }}</th>
                                <th scope="col">{{ __('welcome.nationality') }}</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->profile->getAge() }}
                                    </td>
                                    <td>{{ $user->profile->nationality->name ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row col-12 col-md-7 col-lg-8 pl-3 latest_user2 mb-4">
                    @foreach ($users->take(6) as $user)

                        <div class="row col-12 col-sm-8 col-md-12 col-lg-6 mb-2">
                            <div class="col-6 col-md-5 p-0 m-0">
                                <img class="p-0 m-0" style="border: 1px solid #eee;"
                                    src="{{ asset('storage/' . $user->avatar) }}" width="150px" height="150px" alt="">
                            </div>
                            <div class="col-6 col-md-7">
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
                </div>

            @endif
        </div>
    </div>


    <br>
</section>
