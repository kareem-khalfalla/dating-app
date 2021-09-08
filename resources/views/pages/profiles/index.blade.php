<x-app-layout>
    <div class="container container_profile col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div class="shadow m-0">
            <div class="row m-0">
                <div class="box_img col-10 col-md-5 col-lg-3">
                    <figure class="figure">
                        <img src="{{ !is_null($user->profile->image) ? asset('storage/' . $user->profile->image->url) : asset('img/avatar.png') ?? 'N/A' }}"
                            class="figure-img img-fluid rounded" alt="{{ $user->name ?? 'N/A' }}" data-toggle="modal"
                            data-target="#exampleModalCenter">
                    </figure>
                </div>
                <div class="box_info_1 col-11 col-md-7 col-lg-9 m-auto">
                    <p class="lead username"><strong>{{ $user->name ?? 'N/A' }}</strong><br></p>
                    @if (Auth::user()->id == $user->id)
                        <a href="{{ route('friends.index') }}">
                            <button class="btn btn-outline-primary"> <i class="fa fa-users"></i> my additions</button>
                        </a>
                    @else
                        <span class="dropdown">
                            <button class="btn btn-outline-secondary " type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Block</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_add">show
                                    additions</a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#reportAlert">report</a>


                            </div>
                        </span>
                        <a href="{{ route('messageRequest', $user) }}">
                            <button class="btn btn-outline-primary"><i class="fas fa-paper-plane"></i> send
                                message</button>
                        </a>
                        <button class="btn btn-outline-danger"> <i class="fa fa-user-plus"></i> addition</button>
                    @endif
                </div>
                <div class="card card-body col-12">
                    <h4>brief about me</h4>
                    <p class="lead">{{ $user->profile->bio ?? 'N/A' }}</p>
                </div>
                <div class="mt-4 alert alert-{{ $user->profile->progress_bar > 50 ? 'warning' : 'danger' }} alert-dismissible fade show col-12"
                    role="alert">
                    @if ($user->profile->progress_bar == 100)
                        Your personal information is complete
                    @else
                        Your personal information is incomplete, you must complete it in order to enjoy all the
                        features.
                        <strong> <a href="{{ route('profile.edit') }}"> Go to the settings page from here
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

                <div class="box_info col-lg-12">
                    <p class="lead hover_padding">
                        <strong>Email:&nbsp;</strong><span>{{ $user->email ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Phone:&nbsp;</strong><span>{{ $user->phone ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>gender:&nbsp;</strong><span>{{ $user->gender ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>country:&nbsp;</strong><span></span><br></p> --}}
                    <p class="lead hover_padding">
                        <strong>language:&nbsp;</strong><span>{{ $user->profile->languages()->native()->first()->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Birthday:&nbsp;</strong><span>{{ $user->profile->dob }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Country of
                            Origin:&nbsp;</strong><span>{{ $user->profile->hometown_id ?? 'N/A' }}</span><br></p>
                    <p class="lead hover_padding"><strong>Country of
                            residence:&nbsp;</strong><span>{{ $user->profile->country_of_residence_id ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Nationality:&nbsp;</strong><span>{{ $user->profile->nationality->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Boycott:&nbsp;</strong><span>male</span><br></p> --}}
                    <p class="lead hover_padding">
                        <strong>City:&nbsp;</strong><span>{{ $user->profile->state->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Postal
                            code:&nbsp;</strong><span>{{ $user->profile->postal_code ?? 'N/A' }}</span><br></p>
                    <p class="lead hover_padding"><strong>Type of
                            accommodation:&nbsp;</strong><span>{{ $user->profile->residencyStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Moving to another
                            place:&nbsp;</strong><span>{{ $user->profile->relocateStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Native language:&nbsp;</strong><span>arabic</span><br></p> --}}
                    <p class="lead hover_padding"><strong>second
                            language:&nbsp;</strong><span>{{ $user->profile->languages()->second()->first()->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>third
                            language:&nbsp;</strong><span>{{ $user->profile->languages()->third()->first()->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>A profile of your desired
                            partner:&nbsp;</strong><span>male</span><br></p> --}}
                    <p class="lead hover_padding"><strong>The required
                            relationship:&nbsp;</strong><span>{{ $user->profile->relationshipStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Desired method of
                            marriageStatus:&nbsp;</strong><span>{{ $user->profile->marriageStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Change EducationStatus and work:&nbsp;</strong><span>test</span><br> --}}
                    </p>
                    <p class="lead hover_padding">
                        <strong>EducationStatus:&nbsp;</strong><span>{{ $user->profile->educationStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>competence:&nbsp;</strong><span>{{ $user->profile->competence ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>the
                            work:&nbsp;</strong><span>{{ $user->profile->workStatus->name ?? 'N/A' }}</span><br></p>
                    <p class="lead hover_padding"><strong>Monthly
                            income:&nbsp;</strong><span>{{ $user->profile->income ?? 'N/A' }}</span><br></p>
                    @if ($user->gender == 'male')
                        <p class="lead hover_padding"><strong>Do you accept the wife's
                                work?:&nbsp;</strong><span>{{ $user->profile->acceptWifeWorkStatus->name ?? 'N/A' }}</span><br>
                        </p>
                        <p class="lead hover_padding"><strong>Do you accept studying the wife after
                                marriageStatus?:&nbsp;</strong><span>{{ $user->profile->acceptWifeStudyStatus->name ?? 'N/A' }}</span><br>
                        </p>
                    @endif
                    @if ($user->gender == 'female')
                        <p class="lead hover_padding"><strong>You want the
                                work?:&nbsp;</strong><span>{{ $user->profile->wifeWorkStatus->name ?? 'N/A' }}</span><br>
                        </p>

                        <p class="lead hover_padding"><strong>Do you want to study after
                                marriageStatus?:&nbsp;</strong><span>{{ $user->profile->wifeWorkStatus->name ?? 'N/A' }}</span><br>
                        </p>
                    @endif
                    <p class="lead hover_padding">
                        <strong>Religious:&nbsp;</strong><span>{{ $user->profile->religion->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>ReligionMethod:&nbsp;</strong><span>{{ $user->profile->method->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Commitment:&nbsp;</strong><span>{{ $user->profile->obligation->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Prayer:&nbsp;</strong><span>{{ $user->profile->prayer->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Al-fajr
                            prayer:&nbsp;</strong><span>{{ $user->profile->alfajrPrayer->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>fasting:&nbsp;</strong><span>{{ $user->profile->fasting->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Reading the
                            Qoran:&nbsp;</strong><span>{{ $user->profile->readingQuran->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Headdress:&nbsp;</strong><span>{{ $user->profile->headdress->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Jilbab:&nbsp;</strong><span>{{ $user->profile->robeStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Niqab:&nbsp;</strong><span>{{ $user->profile->veilStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>BeardStatus:&nbsp;</strong><span>{{ $user->profile->beardStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>TafaqahStatus in
                            religion:&nbsp;</strong><span>{{ $user->profile->tafaqahStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>If you listen to the lessons, who will you listen
                            to?:&nbsp;</strong><span>{{ $user->profile->lesson_listing ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Listening to
                            music:&nbsp;</strong><span>{{ $user->profile->musicStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Movies and
                            series:&nbsp;</strong><span>{{ $user->profile->showStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Friends of the opposite
                            sex:&nbsp;</strong><span>{{ $user->profile->friendStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Marital
                            Status:&nbsp;</strong><span>{{ $user->profile->maritalStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Do you have
                            children?:&nbsp;</strong><span>{{ $user->profile->childrenStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>number of
                            children:&nbsp;</strong><span>{{ $user->profile->children_count ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Information about
                            children:&nbsp;</strong><span>{{ $user->profile->children_information ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Do you want
                            multiplicity?:&nbsp;</strong><span>{{ $user->profile->polygamyStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Do you accept polygamy?:&nbsp;</strong><span>test</span><br>
                    </p> --}}
                    <p class="lead hover_padding"><strong>desire to have
                            children:&nbsp;</strong><span>{{ $user->profile->childrenDesireStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Current type of
                            housing:&nbsp;</strong><span>{{ $user->profile->shelterType->name ?? 'N/A' }}</span><br>
                    </p> --}}
                    <p class="lead hover_padding"><strong>housing
                            form:&nbsp;</strong><span>{{ $user->profile->shelterShape->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Housing
                            method:&nbsp;</strong><span>{{ $user->profile->shelterWay->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Housing
                            type:&nbsp;</strong><span>{{ $user->profile->shelterType->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Length:&nbsp;</strong><span>{{ $user->profile->height ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>the
                            weight:&nbsp;</strong><span>{{ $user->profile->weight ?? 'N/A' }}</span><br></p>
                    <p class="lead hover_padding"><strong>body
                            type:&nbsp;</strong><span>{{ $user->profile->body->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>skinStatus
                            colour:&nbsp;</strong><span>{{ $user->profile->skinStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>hair
                            colour:&nbsp;</strong><span>{{ $user->profile->hairColor->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>hair
                            length:&nbsp;</strong><span>{{ $user->profile->hairLength->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>hair
                            type:&nbsp;</strong><span>{{ $user->profile->hairKind->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Eye
                            color:&nbsp;</strong><span>{{ $user->profile->eyeColor->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>Wearing the
                            eye:&nbsp;</strong><span>{{ $user->profile->eyeGlass->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>physical
                            healthStatus:&nbsp;</strong><span>{{ $user->profile->healthStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>psychological
                            pattern:&nbsp;</strong><span>{{ $user->profile->psychologicalPattern->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>physical healthStatus:&nbsp;</strong><span>test</span><br></p> --}}
                    <p class="lead hover_padding"><strong>Clarification on physical
                            healthStatus:&nbsp;</strong><span>{{ $user->profile->clarification ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>smoking:&nbsp;</strong><span>{{ $user->profile->smokeStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding">
                        <strong>Alcohol:&nbsp;</strong><span>{{ $user->profile->alcoholStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>halal
                            food:&nbsp;</strong><span>{{ $user->profile->halalFoodStatus->name ?? 'N/A' }}</span><br>
                    </p>
                    <p class="lead hover_padding"><strong>food
                            style:&nbsp;</strong><span>{{ $user->profile->foodType->name ?? 'N/A' }}</span><br>
                    </p>
                    {{-- <p class="lead hover_padding"><strong>Interests:&nbsp;</strong><span>{{ $user->profile->hobbies ?? 'N/A' }}</span><br></p> --}}
                    {{-- <p class="lead hover_padding"><strong>Favorite books:&nbsp;</strong><span>{{ $user->profile->books ?? 'N/A' }}</span><br></p> --}}
                    {{-- <p class="lead hover_padding"><strong>favorite places:&nbsp;</strong><span>{{ $user->profile->places ?? 'N/A' }}</span><br></p> --}}
                    {{-- <p class="lead hover_padding"><strong>Other interests:&nbsp;</strong><span>{{ $user->profile->interests ?? 'N/A' }}</span><br></p> --}}

                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-1 m-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 40px">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 m-0">
                    <img src="{{ !is_null($user->profile->image) ? asset('storage/' . $user->profile->image->url) : asset('img/avatar.png') ?? 'N/A' }}"
                        class="img-fluid" alt="{{ $user->name }}">
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
