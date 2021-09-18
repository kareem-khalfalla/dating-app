<x-app-layout>
    <div class="container container_profile col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div class="shadow m-0">
            <h2>All friends [ {{ count($friends) }} ]</h2>
            <hr>

            <div class="row col-12 m-auto">

                @forelse ($friends as $friend)

                    <div class="row box_frind col-md-6 p-1">
                        <a href="{{ route('profile', $friend) }}">
                            <img class="img_user" src="{{ asset('storage/' . $friend->avatar) }}"
                                alt="user image" data-toggle="tooltip" data-placement="top" title="show profile">
                        </a>
                        <h5 class="col-7">{{ $friend->name }}</h5>
                        @if(request()->route('user')->username == Auth::user()->username)

                            <span class="dropdown pl-2">
                                <button class="btn btn-outline-secondary p-1 pr-2 pl-2" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('profile.remove', $friend) }}">Delete</a>
                                    <a class="dropdown-item" href="{{ route('profile.block', $friend) }}">block</a>
                                </div>
                            </span>
                        @endif

                    </div>
                @empty
                    <p>Empty friends!</p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>
