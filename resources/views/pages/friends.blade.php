<x-app-layout>
    <div class="card shadow">
        <div class="card-header">
            <h4>{{ __('profile.All friends') }} [ {{ count($friends) }} ]</h4>
        </div>
        <div class="card-body">
            @forelse ($friends as $friend)
                <div class="row box_frind col-12 p-1">
                    <a href="{{ route('profile', $friend) }}">
                        <img class="img_user" src="{{ asset('storage/' . $friend->avatar) }}"
                            alt="{{ $friend->name }}">
                    </a>
                    <h5 class="col-5">
                        {{ $friend->name }}
                    </h5>
                    <a wire:click.prevent="deleteUser({{ $friend->sender_id }})"><button
                            class="btn btn-outline-danger">{{ __('profile.delete friend') }}</button></a>
                </div>
            @empty
                <p>{{ __('profile.No friends') }}!</p>
            @endforelse
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">{{ $friends->links() }}</div>
        </div>
    </div>
    
</x-app-layout>