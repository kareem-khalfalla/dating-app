<x-app-layout>
    @section('title')
        {{ __('navbar.title_profile') }}
    @endsection
    <br><br><br>
    <div class="container container_profile col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div class="shadow m-0">
            <div class="row m-0">
                <div class="box_img col-10 col-md-5 col-lg-3">
                    <figure class="figure">
                        <img src="{{ !is_null($user->avatar) ? asset('storage/' . $user->avatar) : asset('images/users-avatar/default.svg') ?? 'N/A' }}"
                            class="figure-img img-fluid rounded" alt="{{ $user->username ?? 'N/A' }}"
                            data-toggle="modal" data-target="#exampleModalCenter">
                    </figure>
                </div>

                <div class="box_info_1 col-11 col-md-7 col-lg-9 m-auto">
                    <p class="lead username"><strong>{{ $user->username ?? 'N/A' }}</strong><br></p>
                    @livewire('profile-actions', [
                    'user' => $user,
                    'isPending' => $isPending,
                    'isFriend' => $isFriend,
                    ])
                </div>
                <div class="card card-body col-12">
                    <h4>{{ __('profile.brief about me') }}</h4>
                    <p class="lead">{{ $user->profile->bio ?? 'N/A' }}</p>
                </div>
                {{-- $user->profile->progress_bar < 99.99 --}}
                @if ($user->justMe())

                    <div class="mt-4 alert alert-{{ $user->profile->progress_bar > 50 ? 'warning' : 'danger' }} alert-dismissible fade show col-12"
                        role="alert">
                        @if ($user->profile->progress_bar > 99)
                            {{ __('profile.Your personal information is complete') }}
                        @else
                            {{ __('profile.Your personal information is incomplete, you must complete it in order to enjoy all the features.') }}
                            <strong> <a href="{{ route('settings') }}">
                                    {{ __('profile.Go to the settings page from here') }}
                                </a></strong>
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="progress col-12 p-0">
                        <div class="progress-bar progress-bar-striped bg-{{ $user->profile->progress_bar > 50 ? 'success' : 'warning' }}"
                            role="progressbar" style="width: {{ $user->profile->progress_bar }}%;"
                            aria-valuenow="{{ $user->profile->progress_bar }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $user->profile->progress_bar }}</div>
                    </div>
                @endif


                <div class="box_info col-lg-12">

                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Email') }}:&nbsp;</strong><span>{{ $user->email }}</span><br>
                    </p>

                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Phone') }}:&nbsp;</strong><span>{{ $user->phone }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.gender') }}:&nbsp;</strong><span>{{ __('profile.' . $user->gender) }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Birthday') }}:&nbsp;</strong><span>{{ $user->profile->dob ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Country of Origin') }}:&nbsp;</strong><span>{{ isset($user->profile->countryOfOrigin) ? $user->profile->countryOfOrigin->getCountryLocale() : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Country of residence') }}:&nbsp;</strong><span>{{ isset($user->profile->countryOfOrigin) ? $user->profile->countryOfResidence->getCountryLocale() : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Nationality') }}:&nbsp;</strong><span>{{ isset($user->profile->nationality) ? $user->profile->nationality->getName() : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.City') }}:&nbsp;</strong><span>{{ $user->profile->state->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Postal code') }}:&nbsp;</strong><span>{{ $user->profile->postal_code ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Type of accommodation') }}:&nbsp;</strong><span>{{ isset($user->profile->residence_status) ? __('data.' . $user->profile->residence_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Moving to another place') }}:&nbsp;</strong><span>{{ isset($user->profile->relocate_status) ? __('data.' . $user->profile->relocate_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Native language') }}:&nbsp;</strong>{{ $user->profile->nativeLanguage->nativeName ?? 'N/A' }}<span></span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Second Language') }}:&nbsp;</strong>{{ $user->profile->secondLanguage->nativeName ?? 'N/A' }}<span></span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Third Language') }}:&nbsp;</strong>{{ $user->profile->thirdLanguage->nativeName ?? 'N/A' }}<span></span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.The required relationship') }}:&nbsp;</strong><span>{{ isset($user->profile->relationship_status) ? __('data.' . $user->profile->relationship_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Desired method of marriageStatus') }}:&nbsp;</strong><span>{{ isset($user->profile->marriage_status) ? __('data.' . $user->profile->marriage_status) : 'N/A' }}</span><br>
                    </p>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.EducationStatus') }}:&nbsp;</strong><span>{{ isset($user->profile->education_status) ? __('data.' . $user->profile->education_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.competence') }}:&nbsp;</strong><span>{{ $user->profile->competence ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.the work') }}:&nbsp;</strong><span>{{ isset($user->profile->work) ? __('data.' . $user->profile->work) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Monthly income') }}:&nbsp;</strong><span>{{ $user->profile->income ?? 'N/A' }}</span><br>
                    </p>
                    @if ($user->gender == 'male')
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Do you accept the wife\'s work?') }}:&nbsp;</strong><span>{{ isset($user->profile->male_work_status) ? __('data.' . $user->profile->male_work_status) : 'N/A' }}</span><br>
                        </p>
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Do you accept studying the wife after marriageStatus?') }}:&nbsp;</strong><span>{{ isset($user->profile->male_study_status) ? __('data.' . $user->profile->male_study_status) : 'N/A' }}</span><br>
                        </p>
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Do you want multiplicity?') }}:&nbsp;</strong><span>{{ isset($user->profile->male_polygamy_status) ? __('data.' . $user->profile->male_polygamy_status) : 'N/A' }}</span><br>
                        </p>
                    @endif
                    @if ($user->gender == 'female')
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.You want the work?') }}:&nbsp;</strong><span>{{ $user->profile->female_work_status ?? 'N/A' }}</span><br>
                        </p>

                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Do you want to study after marriageStatus?') }}:&nbsp;</strong><span>{{ $user->profile->female_work_status ?? 'N/A' }}</span><br>
                        </p>
                    @endif
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Religious') }}:&nbsp;</strong><span>{{ isset($user->profile->religion) ? __('data.' . $user->profile->religion) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.ReligionMethod') }}:&nbsp;</strong><span>{{ isset($user->profile->religion_method) ? __('data.' . $user->profile->religion_method) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Commitment') }}:&nbsp;</strong><span>{{ isset($user->profile->obligation) ? __('data.' . $user->profile->obligation) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Prayer') }}:&nbsp;</strong><span>{{ isset($user->profile->prayer) ? __('data.' . $user->profile->prayer) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Al-fajr prayer') }}:&nbsp;</strong><span>{{ isset($user->profile->alfajr_prayer) ? __('data.' . $user->profile->alfajr_prayer) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.fasting') }}:&nbsp;</strong><span>{{ isset($user->profile->fasting) ? __('data.' . $user->profile->fasting) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Reading the Qoran') }}:&nbsp;</strong><span>{{ isset($user->profile->reading_quran) ? __('data.' . $user->profile->reading_quran) : 'N/A' }}</span><br>
                    </p>
                    @if ($user->gender == 'female')

                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Headdress') }}:&nbsp;</strong><span>{{ isset($user->profile->headdress) ? __('data.' . $user->profile->headdress) : 'N/A' }}</span><br>
                        </p>
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Jilbab') }}:&nbsp;</strong><span>{{ isset($user->profile->robe_status) ? __('data.' . $user->profile->robe_status) : 'N/A' }}</span><br>
                        </p>
                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.Niqab') }}:&nbsp;</strong><span>{{ isset($user->profile->veil_status) ? __('data.' . $user->profile->veil_status) : 'N/A' }}</span><br>
                        </p>
                    @else

                        <p class="lead hover_padding row">
                            <strong>{{ __('profile.BeardStatus') }}:&nbsp;</strong><span>{{ isset($user->profile->beard_status) ? __('data.' . $user->profile->beard_status) : 'N/A' }}</span><br>
                        </p>
                    @endif
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.TafaqahStatus in religion') }}:&nbsp;</strong><span>{{ isset($user->profile->tafaqah_status) ? __('data.' . $user->profile->tafaqah_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.If you listen to the lessons, who will you listen to?') }}:&nbsp;</strong><span>{{ $user->profile->lesson_listing ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Listening to music') }}:&nbsp;</strong><span>{{ isset($user->profile->music_status) ? __('data.' . $user->profile->music_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Movies and series') }}:&nbsp;</strong><span>{{ isset($user->profile->show_status) ? __('data.' . $user->profile->show_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Friends of the opposite sex') }}:&nbsp;</strong><span>{{ isset($user->profile->friend_status) ? __('data.' . $user->profile->friend_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Marital Status') }}:&nbsp;</strong><span>{{ isset($user->profile->marital_status) ? __('data.' . $user->profile->marital_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Do you have children?') }}:&nbsp;</strong><span>{{ isset($user->profile->children_status) ? __('data.' . $user->profile->children_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.number of children') }}:&nbsp;</strong><span>{{ $user->profile->children_count ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Information about children') }}:&nbsp;</strong><span>{{ $user->profile->children_information ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.desire to have children') }}:&nbsp;</strong><span>{{ isset($user->profile->children_desire_status) ? __('data.' . $user->profile->children_desire_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.housing form') }}:&nbsp;</strong><span>{{ isset($user->profile->shelter_shape) ? __('data.' . $user->profile->shelter_shape) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Housing method') }}:&nbsp;</strong><span>{{ isset($user->profile->shelter_way) ? __('data.' . $user->profile->shelter_way) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Housing type') }}:&nbsp;</strong><span>{{ isset($user->profile->shelter_type) ? __('data.' . $user->profile->shelter_type) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Length') }}:&nbsp;</strong><span>{{ $user->profile->height ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.the weight') }}:&nbsp;</strong><span>{{ $user->profile->weight ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.body type') }}:&nbsp;</strong><span>{{ isset($user->profile->body_status) ? __('data.' . $user->profile->body_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.skinStatus colour') }}:&nbsp;</strong><span>{{ isset($user->profile->skin_status) ? __('data.' . $user->profile->skin_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.hair colour') }}:&nbsp;</strong><span>{{ isset($user->profile->hair_color) ? __('data.' . $user->profile->hair_color) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.hair length') }}:&nbsp;</strong><span>{{ isset($user->profile->hair_length) ? __('data.' . $user->profile->hair_length) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.hair type') }}:&nbsp;</strong><span>{{ isset($user->profile->hair_kind) ? __('data.' . $user->profile->hair_kind) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Eye color') }}:&nbsp;</strong><span>{{ isset($user->profile->eye_color) ? __('data.' . $user->profile->eye_color) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Wearing the eye') }}:&nbsp;</strong><span>{{ isset($user->profile->eye_glass) ? __('data.' . $user->profile->eye_glass) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.physical healthStatus') }}:&nbsp;</strong><span>{{ isset($user->profile->health_status) ? __('data.' . $user->profile->health_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.psychological pattern') }}:&nbsp;</strong><span>{{ isset($user->profile->psychological_pattern) ? __('data.' . $user->profile->psychological_pattern) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Clarification on physical healthStatus') }}:&nbsp;</strong><span>{{ $user->profile->clarification ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.smoking') }}:&nbsp;</strong><span>{{ isset($user->profile->smoke_status) ? __('data.' . $user->profile->smoke_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.Alcohol') }}:&nbsp;</strong><span>{{ isset($user->profile->alcohol_status) ? __('data.' . $user->profile->alcohol_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.halal food') }}:&nbsp;</strong><span>{{ isset($user->profile->halal_food_status) ? __('data.' . $user->profile->halal_food_status) : 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.food style') }}:&nbsp;</strong><span>{{ isset($user->profile->food_type) ? __('data.' . $user->profile->food_type) : 'N/A' }}</span><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
