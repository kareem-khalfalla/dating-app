<div class="card shadow">
    <div class="card-header">
        <h4>All requests [ {{ count($requests) }} ]</h4>
    </div>
    <div class="card-body">
        @forelse ($requests as $request)
            <div class="row box_frind col-12 p-1">
                <a href="profile-id.html">
                    <img class="img_user" src="img/avatar.png" alt="user image">
                </a>
                <h5 class="col-5">User name</h5>
                <a wire:click.prevent="acceptFriend({{ $request->from }})" href="#"><button
                        class="btn btn-outline-primary">accept</button></a>&nbsp;
                <a href="#"><button class="btn btn-outline-danger">cancel</button></a>
            </div>
        @empty
            <p>No requests!</p>
        @endforelse
    </div>
</div>
