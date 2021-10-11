<div class="card shadow">
    <div class="card-header">
        <h4>{{ __('requests.All requests') }} [ {{ count($requests) }} ]</h4>
    </div>
    <div class="card-body">
        @forelse ($requests as $request)
            @php
                $user = \App\Models\User::find($request->sender_id);
            @endphp
            <div class="row box_frind col-12 p-1">
                <a href="{{ route('profile', $user) }}">
                    <img class="img_user" src="{{ asset('storage/' . $user->avatar) }}"
                        alt="{{ $user->username }}">
                </a>
                <h5 class="col-5">
                    {{ $user->username }}
                </h5>
                <a wire:click.prevent="accept({{ $request->sender_id }})"><button
                        class="btn btn-outline-primary">{{ __('requests.accept') }}</button></a>&nbsp;
                <a wire:click.prevent="deny({{ $request->sender_id }})"><button
                        class="btn btn-outline-danger">{{ __('requests.cancel') }}</button></a>
            </div>
        @empty
            <p>{{ __('requests.No requests') }}!</p>
        @endforelse
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $requests->links() }}
        </div>
    </div>
</div>
