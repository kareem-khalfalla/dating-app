<div>
    @if (Auth::user()->id == $user->id)
        <div class="row">
            <a href="{{ route('friends') }}">
                <button class="btn btn-outline-primary m-1">
                    <i class="fa fa-users mr-2"></i>
                    {{ __('profile.my additions') }}
                </button>
            </a>
            <button class="btn btn-outline-secondary m-1" data-toggle="modal" data-target="#modal_sent"> <i
                    class="fa fa-users mr-2"></i>{{ __('profile.sent additions') }}</button>
            <button class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#modal_blocked"> <i
                    class="fa fa-users mr-2"></i>{{ __('profile.blocked users') }}</button>
        </div>
    @else
        <span class="dropdown dropleft">
            <button class="btn btn-outline-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>

            <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                @if (!$user->isBlockedBy(Auth::user()))
                    <a class="dropdown-item" href="#"
                        wire:click.prevent="blockUser({{ $user->id }})">{{ __('profile.Block') }}</a>
                @endif
                <a class="dropdown-item" href="#" data-toggle="modal"
                    data-target="#modal_add">{{ __('profile.show additions') }}</a>
                <a class="dropdown-item" href="#" data-toggle="modal"
                    data-target="#reportAlert">{{ __('profile.report') }}</a>
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
            btn-outline-danger">
                    <i class="fa fa-user-plus"></i> {{ __('profile.Addition') }}</button></a>
        @elseif($isPending)
            @if ($user->hasSentFriendRequestTo(Auth::user()))
                <a wire:click.prevent="acceptFriendRequest({{ $user->id }})"><button
                        class="btn btn-outline-success">
                        <i class="fa fa-user-plus"></i> {{ __('profile.Accept Friend Request') }}</button></a>
            @endif

            <a wire:click.prevent="deleteUser({{ $user->id }})"><button
                    class=" btn
                    btn-outline-danger"> <i class="fa fa-trash"></i>
                    {{ __('profile.remove request') }}</button></a>


        @elseif($isFriend)
            <a wire:click.prevent="deleteUser({{ $user->id }})"><button
                    class="btn btn-outline-danger"> <i class="fa fa-user-trash"></i>
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
                    <h3 class="modal-title" id="exampleModalLongTitle">{{ __('profile.Report') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead">{{ __('profile.reportDescription') }}</p>
                    <textarea
                        class="form-control @error('report')
                        is-invalid
                    @enderror"
                        wire:model.defer="report" cols="30" rows="5"
                        placeholder="{{ __('profile.your report here') }}..."></textarea>
                    @error('report')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit"
                        class="btn btn-black btn-danger mt-3">{{ __('profile.Send report') }}</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal additions -->
    <div wire:ignore.self class="modal fade" id="modal_add" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('profile.Additions') }}
                        [ {{ $friendsCount }} ]</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 80vh; overflow-y: scroll;">
                    @forelse ($friends as $friend)
                        <div class="row box_frind col-12 p-1" {{ $loop->last ? 'id=last_friend' : '' }}>
                            <a href="{{ route('profile', $friend) }}">
                                <img class="img_user" src="{{ asset('storage/' . $friend->avatar) }}"
                                    alt="{{ $friend->name }}" data-toggle="tooltip" data-placement="top"
                                    title="show profile">
                            </a>
                            <h5 class="col-6">{{ $friend->name }}</h5>
                            @if (!$friend->isFriendWith(Auth::user()))

                                <a href="#"><button
                                        class="btn btn-outline-success">{{ __('profile.Addition') }}</button></a>&nbsp;
                            @else
                                <a wire:click.prevent="deleteUser({{ $friend->id }})"><button
                                        class="btn btn-outline-danger">{{ __('profile.Delete') }}</button></a>&nbsp;
                            @endif
                        </div>
                    @empty
                        <p>{{ __('profile.Empty friends') }}!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal sent additions -->
    <div wire:ignore.self class="modal fade" id="modal_sent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('profile.Additions') }} [
                        {{ $pendingUsersCount }} ]</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 80vh; overflow-y: scroll;">
                    @forelse ($pendingUsers as $pendingUser)
                        <div class="row box_frind col-12 p-1" {{ $loop->last ? 'id=last_pending_friend' : '' }}>
                            <a href="{{ route('profile', $pendingUser) }}">
                                <img class="img_user" src="{{ asset('storage/' . $pendingUser->avatar) }}"
                                    alt="{{ $pendingUser->username }}" data-toggle="tooltip" data-placement="top"
                                    title="show profile">
                            </a>
                            <h5 class="col-6">{{ $pendingUser->username }}</h5>
                            <a wire:click.prevent="deleteUser({{ $pendingUser->id }})"><button
                                    class="btn btn-outline-danger">{{ __('profile.Delete') }}</button></a>&nbsp;

                        </div>
                    @empty
                        <p>{{ __('profile.Empty friends') }}!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal blocked users -->
    <div wire:ignore.self class="modal fade" id="modal_blocked" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('profile.blockedList') }}
                        [ {{ $blockedUsersCount }} ]</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 80vh; overflow-y: scroll;">
                    @forelse ($blockedUsers as $blockedUser)
                        <div class="row box_frind col-12 p-1" {{ $loop->last ? 'id=last_blocked_friend' : '' }}>
                            <a href="#">
                                <img class="img_user"
                                    src="{{ asset('storage/' . \App\Models\User::find($blockedUser->recipient_id)->avatar) }}"
                                    alt="{{ $blockedUser->username }}" data-toggle="tooltip" data-placement="top"
                                    title="show profile">
                            </a>
                            <h5 class="col-6">
                                {{ \App\Models\User::find($blockedUser->recipient_id)->username }}</h5>
                            <a wire:click.prevent="unblockUser({{ $blockedUser->recipient_id }})"><button
                                    class="btn btn-outline-danger">{{ __('profile.unBlock') }}</button></a>&nbsp;

                        </div>
                    @empty
                        <p>{{ __('profile.Empty blocked list') }}!</p>
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
                $('#modal_sent').modal('hide');
                $('#modal_blocked').modal('hide');
                $('#reportAlert').modal('hide');
            });
        });
    </script>
@endpush

<x-loadMore id="last_friend"/>
<x-loadMore id="last_pending_friend"/>
<x-loadMore id="last_blocked_friend"/>
