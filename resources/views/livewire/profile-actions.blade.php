<div>
    @if (Auth::user()->id == $user->id)
        <a href="#">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_add">
                <button class="btn btn-outline-primary"> <i class="fa fa-users"></i>
                    my additions</button>
            </a>

        </a>
    @else
        <span class="dropdown">
            <button class="btn btn-outline-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if (!$user->isBlockedBy(Auth::user()))
                    <a class="dropdown-item"
                        wire:click.prevent="blockUser({{ $user->id }})">{{ __('profile.Block') }}</a>
                @endif
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_add">show additions</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#reportAlert">report</a>
            </div>
        </span>
        @if ($isFriend)
            <a href="{{ route('chat') }}">
                <button class="btn btn-outline-primary"><i class="fas fa-paper-plane"></i>
                    {{ __('profile.send message') }}</button>
            </a>
        @endif
        @if (!$isPending && !$isFriend && !$user->isBlockedBy(Auth::user()))
            <a wire:click.prevent="addFriend({{ $user->id }})"><button class=" btn
            btn-outline-danger"> <i
                        class="fa fa-user-plus"></i> {{ __('profile.addition') }}</button></a>
        @elseif($isPending)
            <a wire:click.prevent="deleteUser({{ $user->id }})"><button
                    class=" btn
                    btn-outline-danger"> <i class="fa fa-user-trash"></i>
                    {{ __('profile.remove request') }}</button></a>
        @elseif($isFriend)
            <a wire:click.prevent="deleteUser({{ $user->id }})"><button
                    class=" btn
                            btn-outline-danger"> <i class="fa fa-user-trash"></i>
                    {{ __('profile.delete friend') }}</button></a>
        @else
            <a wire:click.prevent="unblockUser({{ $user->id }})"><button
                    class=" btn
            btn-outline-danger"> <i class="fa fa-user-trash"></i>
                    {{ __('profile.remove block') }}</button></a>
        @endif
    @endif

    <!-- Modal report -->
    <div class="modal fade" id="reportAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" wire:ignore.self>
        <form class="modal-dialog modal-dialog-centered" role="document" wire:submit.prevent="createReport">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Report</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead">Report the user if you see that he is violating the laws and the
                        action will be taken or in the event of offending you or something similar to that</p>
                    <textarea
                        class="form-control @error('report')
                        is-invalid
                    @enderror"
                        wire:model.defer="report" cols="30" rows="5" placeholder="your report here..."></textarea>
                    @error('report')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-black btn-danger mt-3">Send report</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal additions -->
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">additions [ {{ count($friends) }} ]</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 80vh; overflow-y: scroll;">

                    @forelse ($friends as $friend)

                        <div class="row box_frind col-12 p-1">
                            <a href="{{ route('profile', $friend) }}">
                                <img class="img_user" src="{{ asset('storage/' . $friend->avatar) }}"
                                    alt="{{ $friend->name }}" data-toggle="tooltip" data-placement="top"
                                    title="show profile">
                            </a>
                            <h5 class="col-6">{{ $friend->name }}</h5>
                            @if (!$friend->isFriendWith(Auth::user()))

                                <a href="#"><button class="btn btn-outline-success">Addition</button></a>&nbsp;
                            @else
                                <a wire:click.prevent="deleteUser({{ $friend->id }})"><button
                                        class="btn btn-outline-danger">Delete</button></a>&nbsp;
                            @endif

                        </div>
                    @empty
                        <p>Empty friends!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            addEventListener('hide-form', event => {
                $('#modal_add').modal('hide');
                $('#reportAlert').modal('hide');
            });
        });
    </script>
@endpush