<div class="card shadow">
    <div class="card-header">
        <h4>All requests [ {{ count($requests) }} ]</h4>
    </div>
    <div class="card-body">
        @forelse ($requests as $request)
            <div class="row box_frind col-12 p-1">
                <a href="profile-id.html">
                    <img class="img_user"
                        src="{{ asset('storage/' . \App\Models\User::find($request->sender_id)->avatar) }}"
                        alt="{{ \App\Models\User::find($request->sender_id)->name }}"
                        >
                </a>
                <h5 class="col-5">
                    {{ \App\Models\User::find($request->sender_id)->name }}
                </h5>
                <a wire:click.prevent="accept({{ $request->sender_id }})"><button
                        class="btn btn-outline-primary">accept</button></a>&nbsp;
                <a wire:click.prevent="deny({{ $request->sender_id }})"><button
                        class="btn btn-outline-danger">cancel</button></a>
            </div>
        @empty
            <p>No requests!</p>
        @endforelse
    </div>
</div>
